<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Product.php";
require_once ROOT_PATH . "/utils/Cart.php";

$Account = new Account();
$Product = new Product();
$Cart = new Cart($Account->getAccountID());

$account = $Account->getAccount();

if (!$account) {
    header('Location: /auth');
    exit();
} else {
    global $account;
    $account_profile = $Account->getAccountProfile();
    $account_payment = $Account->getAccountPayment();

    $cart = $Cart->get();

    if (empty($cart)) {
        header('Location: /account');
        exit();
    }

    $body_component = ROOT_PATH . '/layouts/account/index.php';
    $no_nav = true;
    $subtitle = 'Giỏ hàng';
    require_once ROOT_PATH . '/components/template/global/index.php';
}
