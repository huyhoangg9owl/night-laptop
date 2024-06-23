<?php
if (!isset($_GET['id'])) {
    header("Location: /");
    exit;
};

$product_id = $_GET['id'];
$quantity = $_GET['quantity'] ?? 1;

if (!is_numeric($product_id) || !is_numeric($quantity)) {
    header("Location: /");
    exit;
};

require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Product.php";

$account = new Account();
$product = new Product();

if (!$account->checkToken()) {
    header("Location: /");
    exit;
};

if ($product->getQuantityAvailable($product_id) < 1) {
    header("Location: /product/$product_id");
    exit;
}

$account->addToCart($product_id, $quantity);

echo $conn->error;

header("Location: /product/$product_id");

exit;
