<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Product.php";
require_once ROOT_PATH . "/utils/Order.php";

$Account = new Account();

$account = $Account->getAccountProfile();

if ($account) {
    $role = $account['role'];
    if ($role) {
        $Order = new Order($Account->getAccountID());
        $Product = new Product();

        $best_seller_products = $Order->getBestSellerProducts();
        $best_seller_categories = $Order->getBestSellerCategories();

        $orders = $Order->getOrder();
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
