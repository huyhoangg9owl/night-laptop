<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Product.php";

$Account = new Account();
$account = $Account->getAccountProfile();

if ($account) {
    $role = $account['role'];
    if ($role) {
        $accounts = $Account->getAllAccount();
        $body_component = ROOT_PATH . '/layouts/admin/account/index.php';
        require_once ROOT_PATH . '/components/template/admin/index.php';
    } else {
        header("Location: /not-found");
        exit();
    }
} else {
    header("Location: /not-found");
    exit();
}
