<?php
require_once ROOT_PATH . "/utils/account.php";
$Account = new Account();
$account = $Account->getAccount();

if (!$account) {
    header('Location: /auth');
    exit();
} else {
    $account_profile = $Account->getAccountProfile();
    $account_payment = $Account->getAccountPayment();
    $body_component = ROOT_PATH . '/layouts/account/index.php';
    $no_nav = true;
    $subtitle = 'Giỏ hàng';
    require_once ROOT_PATH . '/components/template/index.php';
}
