<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
session_unset();

require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/Product.php";

$product = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    if ($product->getProductById($id)) {
        $product->deleteProduct($id);
    }
    session_unset();
    header("Location: /admin/product");
}

session_write_close();
exit();
