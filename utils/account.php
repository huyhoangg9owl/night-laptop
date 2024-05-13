<?php
require_once ROOT_PATH . "/lib/php/config.php";

class Account
{
    protected string|null $token;
    protected array|null $account = null;

    public function __construct($account = null)
    {
        if (isset($account)) $this->account = $account;
        if (isset($_COOKIE['auth_token'])) $this->token = $this->getToken();
    }

    public function getToken(): string|null
    {
        if (isset($this->token)) return $this->token;
        if (isset($_COOKIE['auth_token'])) return $_COOKIE['auth_token'];
        return null;
    }

    public function getAccount(): array|null
    {
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

    public function getAccountProfile()
    {
        global $conn;
        if ($this->checkToken()) {
            $id = $this->getAccountID();
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

    public function getAccountPayment()
    {
        global $conn;
        if ($this->checkToken()) {
            $id = $this->getAccountID();
            $result = $conn->query("SELECT * FROM account_payment_info WHERE account_id = ?", [$id]);
            if ($result) return $conn->fetch_once();
            return null;
        }
        return null;
    }
}
