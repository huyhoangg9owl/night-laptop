<?php
require_once ROOT_PATH . "/config/config.php";

class Cart
{
    private int $account_id;
    private SQL $conn;
    private mixed $error;


    public function __construct(int $account_id)

    {
        global $conn;
        $this->conn = $conn;
        $this->account_id = $account_id;
    }

    public function get(): array
    {
        $this->conn->query("SELECT product.id, product_image.image_url, product.name, product.price, cart.quantity, category.name as category, cart.updated_at as time FROM cart INNER JOIN (product, category, product_image) ON product.id = cart.product_id WHERE account_id = ? GROUP BY cart.id", [$this->account_id]);
        return $this->conn->fetch_all();
    }

    public function total(): int
    {
        $this->conn->query("SELECT SUM(product.price * cart.quantity) as total FROM cart INNER JOIN product ON product.id = cart.product_id WHERE account_id = ?", [$this->account_id]);
        return $this->conn->fetch_once()['total'] ?? 0;
    }

    public function getError(): mixed
    {
        if (isset($this->error)) return $this->error;
        return null;
    }
}
