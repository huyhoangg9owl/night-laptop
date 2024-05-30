<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Product.php";

$Account = new Account();
$Product = new Product();


$account = $Account->getAccount();

if (!$account) {
    header('Location: /auth');
    exit();
} else {
    global $account;
    $account_profile = $Account->getAccountProfile();
    $account_payment = $Account->getAccountPayment();

    $cart = $Account->Cart();

    $body_component = ROOT_PATH . '/layouts/account/index.php';
    $no_nav = true;
    $subtitle = 'Giỏ hàng';
    require_once ROOT_PATH . '/components/template/index.php';
}
