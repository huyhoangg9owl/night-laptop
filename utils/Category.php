<?php
require_once ROOT_PATH . "/config/config.php";

class Category
{
    public mixed $error;
    public function getCategories(): array
    {
        global $conn;
        $result = $conn->query("SELECT * FROM category");
        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function getCategoryById(int $id): array|null
    {
        global $conn;
        $result = $conn->query("SELECT * FROM category WHERE id = ?", [$id]);
        if ($result) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function getCategoryByName(string $name): array|null
    {
        global $conn;
        $result = $conn->query("SELECT * FROM category WHERE name = ?", [$name]);
        if ($result) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function getCategoryBySlug(string $slug): array|null
    {
        global $conn;
        $result = $conn->query("SELECT * FROM category WHERE slug = ?", [$slug]);
        if ($result) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function createCategory(string $name): bool
    {
        global $conn;
        $slug = implode("/", array_map("rawurlencode", explode("/", $name)));

        $checkNameValid = $this->getCategoryByName($name);
        if ($checkNameValid) {
            $this->error = "Tên danh mục đã tồn tại";
            return false;
        }

        $checkSlugValid = $this->getCategoryBySlug($slug);
        if ($checkSlugValid) {
            $this->error = "Slug danh mục đã tồn tại";
            return false;
        }

        $conn->query("INSERT INTO category (name, slug) VALUES (?, ?)", [$name, $slug]);
        if ($conn->affected_rows()) return true;
        $this->error = "Tạo danh mục thất bại";
        return false;
    }

    public function updateCategory(int $id, string $name): bool
    {
        global $conn;
        $slug = implode("/", array_map("rawurlencode", explode("/", $name)));
        $conn->query("UPDATE category SET name = ?, slug = ? WHERE id = ?", [$name, $slug, $id]);
        if ($conn->affected_rows()) return true;
        return false;
    }

    public function deleteCategory(int $id): bool
    {
        global $conn;
        $result = $conn->query("DELETE FROM category WHERE id = ?", [$id]);
        if ($result) {
            return true;
        }
        return false;
    }

    public function changeStatusCategories(mixed $ids): bool
    {
        global $conn;
        $ids = is_array($ids) ? $ids : [$ids];
        $ids = array_map(function ($id) {
            return (int)$id;
        }, $ids);
        $ids = implode(",", $ids);
        $conn->query("UPDATE category SET status = 1 WHERE id IN ($ids)");
        if (!$conn->affected_rows()) return false;
        $conn->query("UPDATE category SET status = 0 WHERE id NOT IN ($ids)");
        if ($conn->affected_rows()) return true;
        return false;
    }
}
