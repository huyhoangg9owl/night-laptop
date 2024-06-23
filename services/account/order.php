<?php
require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Order.php";


global $conn;

session_start();
session_unset();

$Account = new Account();
$Order = new Order($Account->getAccountID());

$order_id = $_GET['order_id'] ?? null;

if (isset($order_id)) {
    $Order->cancelOrder($order_id);
}

session_write_close();

header('Location: /account/order');
exit();
