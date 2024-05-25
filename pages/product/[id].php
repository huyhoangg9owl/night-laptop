<?php
require_once ROOT_PATH . "/utils/Product.php";

global $router;
$params = $router->getParams();

$Product = new Product();

$product_id = $params['id'];

$product = $Product->getProductById($product_id);
if (!$product) {
    header("Location: /not-found");
    exit();
}

$subtitle = $product['name'];

$body_component = ROOT_PATH . '/layouts/product/index.php';
require_once ROOT_PATH . '/components/template/index.php';
