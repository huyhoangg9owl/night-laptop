<?php
require_once ROOT_PATH . "/config/config.php";

class Product
{
    public mixed $error;
    public function getProducts(): array
    {
        global $conn;
        $result = $conn->query("SELECT * FROM product");
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function getProductById(int $id): array|null
    {
        global $conn;
        $result = $conn->query("SELECT * FROM product WHERE id = ?", [$id]);
        if ($result) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function getProductByName(string $name): array|null
    {
        global $conn;
        $result = $conn->query("SELECT * FROM product WHERE name = ?", [$name]);
        if ($result) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function createProduct(string $name, int $price, string $description, int $quantity, int $category_id, int $status): bool
    {
        global $conn;
        $checkNameValid = $this->getProductByName($name);
        if ($checkNameValid) {
            $this->error = "Tên danh mục đã tồn tại";
            return false;
        }

        $conn->query("INSERT INTO product (name, price, description, category_id, quantity, visibility) VALUES (?, ?, ?, ?, ?, ?)", [$name, $price, $description, $category_id, $quantity, $status]);
        if ($conn->affected_rows()) return true;
        $this->error = "Tạo sản phẩm thất bại";
        return false;
    }

    public function updateProduct(int $id, string $name, int $price, string $description, int $quantity, int $category_id, int $visibility): bool
    {
        global $conn;
        $checkNameValid = $this->getProductByName($name);
        if ($checkNameValid && $checkNameValid['id'] !== $id) {
            $this->error = "Tên sản phẩm đã tồn tại";
            return false;
        }

        $conn->query("UPDATE product SET name = ?, price = ?, description = ?, category_id = ?, quantity = ?, visibility = ? WHERE id = ?", [$name, $price, $description, $category_id, $quantity, $visibility, $id]);
        if ($conn->affected_rows()) return true;
        $this->error = "Cập nhật sản phẩm thất bại";
        return false;
    }

    public function deleteProduct(int $id): bool
    {
        global $conn;
        $conn->query("DELETE FROM product_image WHERE product_id = ?", [$id]);
        if (!$conn->error()) {
            $conn->query("DELETE FROM product WHERE id = ?", [$id]);
            if (!$conn->error()) return true;
            return false;
        }
        return false;
    }

    public function getProductThumbnail(int $product_id): array|null
    {
        global $conn;
        $result = $conn->query("SELECT * FROM product_image WHERE product_id = ? AND is_thumbnail = 1", [$product_id]);
        if ($result) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function getProductImages(int $product_id): array
    {
        global $conn;
        $result = $conn->query("SELECT * FROM product_image WHERE product_id = ? AND is_thumbnail = 0", [$product_id]);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function getProductCategory(int $category_id)
    {
        global $conn;
        $result = $conn->query("SELECT * FROM category WHERE id = ?", [$category_id]);
        if ($result) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function getTotalProductByCategory(int $category_id): int
    {
        global $conn;
        $result = $conn->query("SELECT COUNT(*) AS total FROM product WHERE category_id = ?", [$category_id]);
        if ($result) {
            return $result->fetch_assoc()['total'];
        }
        return 0;
    }

    public function getQuantity(int $product_id): int
    {
        global $conn;
        $result = $conn->query("SELECT quantity FROM product WHERE id = ?", [$product_id]);
        if ($result) {;
            return $result->fetch_assoc()['quantity'];
        }
        return 0;
    }

    public function getQuantityAvailable(int $product_id): int
    {
        global $conn;
        $conn->query("SELECT SUM(quantity) AS quantity FROM `order` WHERE product_id = ?", [$product_id]);
        if ($conn->num_rows() > 0) {
            $cart = $conn->fetch_once();
            return $this->getQuantity($product_id) - $cart['quantity'];
        }
        return 0;
    }

    public function getReviews(int $product_id): array
    {
        global $conn;
        $result = $conn->query("SELECT * FROM product_review WHERE product_id = ? ORDER BY updated_at DESC", [$product_id]);
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function createReview(int $account_id, int $product_id, string $review, int $star): bool
    {
        global $conn;
        $conn->query("INSERT INTO product_review (account_id, product_id, review, star) VALUES (?, ?, ?, ?)", [$account_id, $product_id, $review, $star]);
        if ($conn->affected_rows()) return true;
        return false;
    }

    public function getError(): mixed
    {
        if (isset($this->error)) return $this->error;
        return null;
    }
}
