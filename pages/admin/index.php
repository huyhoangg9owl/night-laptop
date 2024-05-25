<?php
require_once ROOT_PATH . "/utils/Account.php";
$account = new Account();

$account = $account->getAccountProfile();

if ($account) {
    $role = $account['role'];
    if ($role) {
        $body_component = ROOT_PATH . '/layouts/admin/home/index.php';
        require_once ROOT_PATH . '/components/template/admin/index.php';
    } else {
        header("Location: /not-found");
        exit();
    }
} else {
    header("Location: /not-found");
    exit();
}
