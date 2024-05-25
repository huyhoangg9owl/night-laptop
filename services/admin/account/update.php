<?php

require_once "../../../config/config.php";
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/UploadFile.php";

global $conn;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $avatar = $_FILES["avatar"];
    $account_id = $_POST["id"];
    $account = new Account();


    $avatar_path = Avatar($avatar, $account_id, $account, $conn);
    Account($account_id, $account, $conn);
    if ($avatar_path) AccountProfile($avatar_path, $account_id, $conn);
    header("Location: /admin/account");
    exit();
}

function Avatar($avatar, $account_id, $account, $conn): null|string
{
    if ($avatar["size"] > 0) {
        $user_dir = ROOT_PATH . "/upload/avatar/" . hash("sha256", $account_id . $account->getAccount($account_id)["email"]);
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

function Account($account_id, $account, $conn): void
{
    $username = $_POST["username"];
    $email = $_POST["email"];

    if (isset($username) && isset($email)) {
        $account = $account->getAccount($account_id);
        if ($username !== $account["username"] || $email !== $account["email"]) {
            $conn->query("UPDATE account SET username = ?, email = ? WHERE id = ?", [$username, $email, $account_id]);
        }
    }
}

function AccountProfile($avatar_path, $account_id, $conn): void
{
    $conn->query("UPDATE account_profile SET avatar = ? WHERE account_id = ?", [$avatar_path, $account_id]);
}
