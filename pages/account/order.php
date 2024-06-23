<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Order.php";

$Account = new Account();
$Order = new Order($Account->getAccountID());

$account = $Account->getAccount();
$orders = $Order->getOrder();

if (!$account) {
    header('Location: /auth');
    exit();
} else {
    $account_profile = $Account->getAccountProfile();
    $account_payment = $Account->getAccountPayment();
    global $account;
    $body_component = ROOT_PATH . '/layouts/account/index.php';
    $no_nav = true;
    $subtitle = 'Tài khoản';
    require_once ROOT_PATH . '/components/template/global/index.php';
}
