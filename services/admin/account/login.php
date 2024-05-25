<?php
require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/Account.php";

global $conn;

session_start();
session_unset();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';


$_SESSION['username'] = $username;
$_SESSION['password'] = $password;


if (empty($username)) $_SESSION['errors_code'][] = "missing_username";

if (empty($password)) $_SESSION['errors_code'][] = "missing_password";

if (empty($_SESSION['errors_code'])) {
    try {
        if (str_contains($username, '@')) {
            $query = "SELECT * FROM account WHERE email = ?";
        } else {
            $query = "SELECT * FROM account WHERE username = ?";
        }
        $conn->query($query, [$username]);
        $result = $conn->fetch_once();
        if ($result) {
            if (password_verify($password, $result['password'])) {
                $_SESSION['account'] = json_encode($result);
                $account = new Account($result);
                $account->generateToken();
                header('Location: /account');
            } else {
                $_SESSION['errors_code'][] = "wrong_password";
                header('Location: /auth');
            }
        } else {
            $_SESSION['errors_code'][] = "wrong_username";
            header('Location: /auth');
        }
    } catch (Exception $e) {
        echo "Error:" . json_encode($e);
    }
}

//header('Location: /auth');

session_write_close();
exit();
