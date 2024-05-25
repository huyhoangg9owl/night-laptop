<?php

require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/UploadFile.php";

global $conn;

session_start();
session_unset();

function end_and_close(): void
{
    header('Location: /admin/account/create');
    session_write_close();
    exit();
}


$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$repassword = $_POST['repassword'] ?? '';
$role = $_POST['role'] ?? 0;
$avatar = $_FILES['avatar'];


$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['repassword'] = $repassword;
$_SESSION['role'] = $role;

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
    $sqlAccount = "INSERT INTO account (username, email, password) VALUES ('$username', '$email', '$password')";

    try {
        $conn->query($sqlAccount);
        $account_id = $conn->insertId();

        $sqlAccountPayment = "INSERT INTO account_payment_info (account_id, phone_number, address) VALUES ($account_id, '', '')";
        $sqlAccountProfile = "INSERT INTO account_profile (account_id, role) VALUES ($account_id, $role)";

        $conn->query($sqlAccountPayment);
        $conn->query($sqlAccountProfile);

        $upload_dir = ROOT_PATH . "/upload/avatar/" . hash("sha256", $account_id . $email);

        if ($avatar['error'] == 0) {
            $upload = new UploadFile($avatar);
            $upload->setUploadDir($upload_dir);
            $upload->setAllowedTypes(["image/png", "image/jpeg", "image/jpg"]);
            $upload->setMaxSize(2 * 1024 * 1024);
            $upload->setFileName(
                $account_id . "_" . time() . "_"
            );
            $path = $upload->getPath();
            try {
                $upload->upload();
                $conn->query("UPDATE account_profile SET avatar = ? WHERE account_id = ?", [$path, $account_id]);
            } catch (Exception $e) {
                $_SESSION['error'] = "Upload avatar thất bại: " . $e->getMessage();
            }
        }
    } catch (Throwable $th) {
        $_SESSION['errors_code'][] = "sql_exception";
    }
    session_unset();
    header("Location: /admin/account");
} else {
    end_and_close();
}
