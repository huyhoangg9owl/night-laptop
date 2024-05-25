<?php

require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/UploadFile.php";

global $conn;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $avatar = $_FILES["avatar"];
    $account = new Account();

    $avatar_path = Avatar($avatar, $account, $conn);
    Account($account, $conn);
    if ($avatar_path) AccountProfile($avatar_path, $account, $conn);
    AccountPayment($account, $conn);
    header("Location: /account");
    exit();
}

function Avatar($avatar, $account, $conn): null|string
{
    if ($avatar["size"] > 0) {
        $account_id = $account->getAccountID();
        $user_dir = ROOT_PATH . "/upload/avatar/" . hash("sha256", $account_id . $account->getAccount()["email"]);
        $upload = new UploadFile($avatar);
        $upload->setUploadDir($user_dir);
        $upload->setAllowedTypes(["image/png", "image/jpeg", "image/jpg"]);
        $upload->setMaxSize(2 * 1024 * 1024);
        $upload->setFileName(
            $account_id . "_" . time() . "_"
        );
        $path = $upload->getPath();
        try {
            $upload->upload();
            $conn->query("UPDATE account_profile SET avatar = ? WHERE account_id = ?", [$path, $account_id]);
            return $path;
        } catch (Exception $e) {
            return null;
        }
    }
    return null;
}

function Account($account, $conn): void
{
    $account_id = $account->getAccountID();
    $username = $_POST["username"];
    $email = $_POST["email"];
    $new_password = $_POST["new_password"];
    $confirm_new_password = $_POST["confirm_new_password"];

    if ($new_password && $new_password === $confirm_new_password) {
        $conn->query("UPDATE account SET password = ? WHERE id = ?", [password_hash($new_password, PASSWORD_DEFAULT), $account_id]);
    }

    if (isset($username) && isset($email)) {
        $account = $account->getAccount();
        if ($username !== $account["username"] || $email !== $account["email"]) {
            $conn->query("UPDATE account SET username = ?, email = ? WHERE id = ?", [$username, $email, $account_id]);
            setcookie("auth_token", "", time() - 3600, "/");
        }
    }
}

function AccountProfile($avatar_path, $account, $conn): void
{
    $account_id = $account->getAccountID();
    $conn->query("UPDATE account_profile SET avatar = ? WHERE account_id = ?", [$avatar_path, $account_id]);
}

function AccountPayment($account, $conn): void
{
    $account_id = $account->getAccountID();
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $payment_method = $_POST["payment_method"];
    if ($phone) {
        $conn->query("UPDATE account_payment_info SET phone_number = ? WHERE account_id = ?", [$phone, $account_id]);
    }
    if ($address) {
        $conn->query("UPDATE account_payment_info SET address = ? WHERE account_id = ?", [$address, $account_id]);
    }
    if ($payment_method) {
        $conn->query("UPDATE account_payment_info SET payment_type = ? WHERE account_id = ?", [$payment_method, $account_id]);
    }
}
