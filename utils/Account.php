<?php
require_once ROOT_PATH . "/config/config.php";
require_once ROOT_PATH . "/utils/Product.php";

class Account
{
    protected string|null $token;
    protected array|null $account = null;
    protected $product;

    public function __construct($account = null)
    {
        $this->product = new Product();
        if (isset($account)) $this->account = $account;
        if (isset($_COOKIE['auth_token'])) $this->token = $this->getToken();
    }

    public function getToken(): string|null
    {
        if (isset($this->token)) return $this->token;
        if (isset($_COOKIE['auth_token'])) return $_COOKIE['auth_token'];
        return null;
    }

    public function getAccount(int|null $id = null): array|null
    {
        if (isset($id)) {
            global $conn;
            $result = $conn->query("SELECT * FROM account WHERE id = ?", [$id]);
            if ($result) return $result->fetch_assoc();
        }
        if ($this->checkToken()) return $this->account;
        return null;
    }

    public function checkToken(): bool
    {
        global $conn;
        $token = $this->getToken();
        if (!isset($token)) return false;
        $account = json_decode($this->base64url_decode($token), true);
        if (!isset($account)) return false;
        $result = $conn->query("SELECT * FROM account WHERE email = ?", [$account['email']]);
        if ($result) {
            $this->account = $result->fetch_assoc();
            return true;
        }
        return false;
    }

    private function base64url_decode($data): string
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '='));
    }

    public function generateToken(int $seconds = 604800): void
    {
        if (!isset($this->account)) return;
        $account = $this->account;
        unset($account['password'], $account["id"], $account['updated_at']);
        $account = json_encode($account);
        $token = $this->base64url_encode($account);
        setcookie('auth_token', $token, time() + $seconds, '/');
    }

    private function base64url_encode($data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function getAccountProfile(int|null $id = null)
    {
        global $conn;
        if ($this->checkToken() || isset($id)) {
            $id = $id ?? $this->getAccountID();
            $result = $conn->query("SELECT * FROM account_profile WHERE account_id = ?", [$id]);
            if ($result) return $conn->fetch_once();
            return null;
        }
        return null;
    }

    public function getAccountID(): string|null
    {
        if ($this->checkToken()) {
            global $conn;
            $result = $conn->query("SELECT id FROM account WHERE email = ?", [$this->account['email']]);
            if ($result) {
                $account = $result->fetch_assoc();
                return $account['id'];
            }
            return null;
        }
        return null;
    }

    public function getAccountPayment(int|null $id = null)
    {
        global $conn;
        if ($this->checkToken()) {
            $id = $id ?? $this->getAccountID();
            $result = $conn->query("SELECT * FROM account_payment_info WHERE account_id = ?", [$id]);
            if ($result) return $conn->fetch_once();
            return null;
        }
        return null;
    }

    public function getAllAccount()
    {
        global $conn;
        $result = $conn->query("SELECT * FROM account");
        if ($result) return $conn->fetch_all();
        return null;
    }

    public function deleteAccount(int $id): void
    {
        try {
            global $conn;
            $conn->query("DELETE FROM account_profile WHERE account_id = ?", [$id]);
            $conn->query("DELETE FROM account_payment_info WHERE account_id = ?", [$id]);
            $conn->query("DELETE FROM account WHERE id = ?", [$id]);
        } catch (\Throwable $th) {
        }
    }

    public function Cart(): array|null
    {
        global $conn;
        if ($this->checkToken()) {
            $account_id = $this->getAccountID();
            $result = $conn->query("SELECT cart.*, MAX(product_image.image_url) AS image_url FROM cart LEFT JOIN product_image ON cart.product_id = product_image.product_id WHERE cart.account_id = ? GROUP BY cart.id", [$account_id]);
            if ($result) return $conn->fetch_all();
            return null;
        }
        return null;
    }

    public function isAdmin(): bool
    {
        if ($this->checkToken()) {
            $profile = $this->getAccountProfile();
            if ($profile['role'] === 'admin') return true;
        }
        return false;
    }

    public function addToCart(int $product_id, int $quantity = 1): void
    {
        global $conn;
        $account_id = $this->getAccountID();
        $conn->query("SELECT * FROM cart WHERE account_id = ? AND product_id = ?", [$account_id, $product_id]);

        if ($conn->num_rows() > 0) {
            $cart = $conn->fetch_once();
            if ($quantity < 1) {
                $conn->query("DELETE FROM cart WHERE account_id = ? AND product_id = ?", [$account_id, $product_id]);
            } else {
                $quantity += $cart['quantity'];
                $quantity_available = $this->product->getQuantity($product_id);

                if ($quantity > $quantity_available) $quantity = $quantity_available;
                $this->updateCart($product_id, $quantity);
            };
        } else {
            $quantity_available = $this->product->getQuantity($product_id);

            if ($quantity > $quantity_available) $quantity = $quantity_available;
            $conn->query("INSERT INTO cart (account_id, product_id, quantity) VALUES (?, ?, ?)", [$account_id, $product_id, $quantity]);
        }
    }

    public function updateCart(int $product_id, int $quantity): void
    {
        global $conn;

        if (!isset($account_id)) {
            $account_id = $this->getAccountID();
        };

        if ($quantity < 1) {
            $conn->query("DELETE FROM cart WHERE account_id = ? AND product_id = ?", [$account_id, $product_id]);
        } else {
            $conn->query("SELECT * FROM cart WHERE account_id = ? AND product_id = ?", [$account_id, $product_id]);
            if ($conn->num_rows() < 1) {
                $this->addToCart($product_id, $quantity);
            }
            $quantity_available = $this->product->getQuantity($product_id);
            if ($quantity > $quantity_available) $quantity = $quantity_available;

            $conn->query("UPDATE cart SET quantity = ? WHERE account_id = ? AND product_id = ?", [$quantity, $account_id, $product_id]);
        }
    }
}
