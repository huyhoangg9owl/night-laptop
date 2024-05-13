<?php

use JetBrains\PhpStorm\NoReturn;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "../lib/php/config.php";

session_start();
session_unset();

#[NoReturn] function end_and_close(): void
{
    header('Location: /auth?t=1');
    session_write_close();
    exit();
}


$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$repassword = $_POST['repassword'] ?? '';


$conn = $GLOBALS['conn'];

$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['repassword'] = $repassword;

if (empty($username)) $_SESSION['errors_code'][] = "missing_username";

if (empty($email)) $_SESSION['errors_code'][] = "missing_email";

if (empty($password)) $_SESSION['errors_code'][] = "missing_password";

if (empty($repassword)) $_SESSION['errors_code'][] = "missing_repassword";

if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $_SESSION['errors_code'][] = "invalid_email";

if ($password != $repassword) $_SESSION['errors_code'][] = "password_not_match";

if (empty($_SESSION['errors_code'])) {
    $sqlCheckEmailValid = "SELECT * FROM account WHERE email = '$email'";
    $sqlCheckUsernameValid = "SELECT * FROM account WHERE username = '$username'";

    $resultSQLValid = $conn->query($sqlCheckEmailValid);

    if ($resultSQLValid->num_rows > 0) {
        $_SESSION['errors_code'][] = "email_exist";
    }

    $resultSQLValid = $conn->query($sqlCheckUsernameValid);

    if ($resultSQLValid->num_rows > 0) {
        $_SESSION['errors_code'][] = "username_exist";
    }

    if (!empty($_SESSION['errors_code'])) end_and_close();

    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO account (username, email, password) VALUES ('$username', '$email', '$password')";
    try {
        $conn->query($sql);
        header("Location: /auth");
    } catch (Throwable $th) {
        $_SESSION['errors_code'][] = "sql_exception";
    }
} else {
    end_and_close();
}