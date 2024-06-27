<?php
require_once ROOT_PATH . "/config/config.php";
require_once ROOT_PATH . "/utils/Product.php";
require_once ROOT_PATH . "/utils/Account.php";

class Order
{
    private int $account_id;
    private SQL $conn;
    private mixed $error;
    private mixed $Product;
    private mixed $Account;

    public function __construct(int $account_id)

    {
        global $conn;
        $this->conn = $conn;
        $this->account_id = $account_id;
        $this->Product = new Product();
        $this->Account = new Account();
    }

    public function getOrder(bool $all = false): array
    {
        if ($all) {
            $this->conn->query("SELECT `order`.*, `product`.name FROM `order` INNER JOIN `product` ON `order`.product_id = `product`.id GROUP BY `order`.id");
        } else {
            $this->conn->query("SELECT `order`.*, `product`.name FROM `order` INNER JOIN `product` ON `order`.product_id = `product`.id WHERE `order`.account_id = ? GROUP BY `order`.id", [$this->account_id]);
        }

        return $this->conn->fetch_all();
    }

    public function createOrder(string|null $payment_id, string $product_id, int $quantity, int $total, string $name_reciver, string $phone_number, string $address, string $payment_type): bool
    {
        if ($payment_id) {
            $this->conn->query("INSERT INTO `order` (account_id, payment_id, product_id, quantity, total, name_reciver, phone, address, payment_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [$this->account_id, $payment_id, $product_id, $quantity, $total, $name_reciver, $phone_number, $address, $payment_type]);
        } else {
            $this->conn->query("INSERT INTO `order` (account_id, product_id, quantity, total, name_reciver, phone, address, payment_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", [$this->account_id, $product_id, $quantity, $total, $name_reciver, $phone_number, $address, $payment_type]);
        }

        if ($this->conn->affected_rows()) {
            $this->conn->query("DELETE FROM cart WHERE account_id = ? AND product_id = ?", [$this->account_id, $product_id]);
            return true;
        };
        $this->error = $this->getError();
        return false;
    }

    public function cancelOrder(string $order_id): void
    {
        $this->conn->query("UPDATE `order` SET status = 0 WHERE account_id = ? AND id = ?", [$this->account_id, $order_id]);
    }

    public function updateOrderStatus(string $order_id, string $status): void
    {
        $this->conn->query("UPDATE `order` SET status = ? WHERE id = ?", [$status, $order_id]);
    }

    public function getPaymentID(): array
    {
        $this->conn->query("SELECT payment_id FROM `order` WHERE account_id = ?", [$this->account_id]);
        return $this->conn->fetch_all();
    }


    public function getBestSellerProducts(): array
    {
        global $conn;
        $conn->query("SELECT product_id, SUM(quantity) AS total FROM `order` GROUP BY product_id ORDER BY total DESC LIMIT 5");
        if ($conn->num_rows() > 0) {
            $best_seller = $conn->fetch_all();
            $products = [];
            foreach ($best_seller as $item) {
                $product = $this->Product->getProductById($item['product_id']);
                $product['sold'] = $item['total'];
                $product['profit'] = $product['sold'] * $product['price'];
                $products[] = $product;
            }
            return $products;
        }
        return [];
    }

    public function getBestSellerCategories(): array
    {
        global $conn;
        $conn->query("SELECT `product`.category_id, SUM(`order`.quantity) AS total FROM `order` INNER JOIN `product` ON `order`.product_id = `product`.id GROUP BY `product`.category_id ORDER BY total DESC LIMIT 5");
        if ($conn->num_rows() > 0) {
            $best_seller = $conn->fetch_all();
            $categories = [];
            foreach ($best_seller as $item) {
                $category = $this->Product->getProductCategory($item['category_id']);
                $category['sold'] = $item['total'];
                $category['total_product'] = $this->Product->getTotalProductByCategory($item['category_id']);
                $categories[] = $category;
            }
            return $categories;
        }
        return [];
    }

    public function getError(): mixed
    {
        if (isset($this->error)) return $this->error;
        return null;
    }
}
