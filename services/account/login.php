<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "../lib/php/config.php";
require_once ROOT_PATH . "/utils/account.php";

session_start();
session_unset();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$conn = $GLOBALS['conn'];

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;


if (empty($username)) $_SESSION['errors_code'][] = "missing_username";

if (empty($password)) $_SESSION['errors_code'][] = "missing_password";

if (empty($_SESSION['errors_code'])) {
    try {
        $query = "SELECT * FROM account WHERE username = ?";
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
