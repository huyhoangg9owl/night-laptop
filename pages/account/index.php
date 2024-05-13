<?php
require_once ROOT_PATH . "/utils/account.php";
$account = new Account();
$account = $account->getAccount();

if (!$account) {
    header('Location: /auth');
    exit();
} else {
    $body_component = ROOT_PATH . '/layouts/account/index.php';
    $no_nav = true;
    $subtitle = 'Tài khoản';
    require_once ROOT_PATH . '/components/template/index.php';
}
