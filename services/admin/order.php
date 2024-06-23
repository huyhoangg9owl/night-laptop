<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
session_unset();

require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Order.php";

$Account = new Account();
$Order = new Order($Account->getAccountID());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_status = $_POST['status'];
    foreach ($order_status as $id => $status) {
        $Order->updateOrderStatus($id, $status);
    }
    header("Location: /admin/order");
}

session_write_close();
exit();
