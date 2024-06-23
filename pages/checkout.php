<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Cart.php";
require_once ROOT_PATH . "/utils/Order.php";

$Account = new Account();
$Cart = new Cart($Account->getAccountID());
$Order = new Order($Account->getAccountID());

$cart = $Cart->get();

if (empty($cart) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: /');
    exit();
}

$account_payment = $Account->getAccountPayment();
$body_component = ROOT_PATH . '/layouts/checkout/index.php';

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['checkout'])
) {
    try {
        $name_reciver = $_POST['name_reciver'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $payment_method = $_POST['payment_method'];

        if ($name_reciver === "" || $phone_number === "" || $address === "" || $payment_method === "") {
            throw new Exception("Vui lòng nhập đầy đủ thông tin thanh toán.");
        }

        $items = array_map(function ($item) {
            return [
                "name" => $item['name'],
                "quantity" => $item['quantity'],
                "price" => (int)$item['price']
            ];
        }, $cart);

        foreach ($cart as $item) {
            $Order->createOrder(null, $item['id'], $item['quantity'], $item['price'] * $item['quantity'], $name_reciver, $phone_number, $address, $payment_method);
        }
        $body_component = ROOT_PATH . '/layouts/checkout/success.php';
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}

$no_nav = true;
$subtitle = 'Giỏ hàng';
require_once ROOT_PATH . '/components/template/print/index.php';
