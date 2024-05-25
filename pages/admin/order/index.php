<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Product.php";

$account = new Account();
$account = $account->getAccountProfile();
$Product = new Product();

if ($account) {
    $role = $account['role'];
    if ($role) {
        $products = $Product->getProducts();
        $body_component = ROOT_PATH . '/layouts/admin/order/index.php';
        require_once ROOT_PATH . '/components/template/admin/index.php';
    } else {
        header("Location: /not-found");
        exit();
    }
} else {
    header("Location: /not-found");
    exit();
}
