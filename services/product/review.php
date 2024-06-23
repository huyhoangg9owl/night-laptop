<?php
require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/Product.php";
require_once ROOT_PATH . "/utils/Account.php";

$Product = new Product();
$Account = new Account();


$_POST['review'] = htmlspecialchars($_POST['review'] ?? "");

$product_id = $_POST['product_id'];
$review = $_POST['review'];
$star = $_POST['star'];

if (empty($review) || empty($star)) {
    header("Location: /product/$product_id");
    exit();
}

$account_id = $Account->getAccountId();
$Product->createReview($account_id, $product_id, $review, $star);

header("Location: /product/$product_id");
exit();
