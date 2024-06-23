<?php
global $router, $conn;


$search = $_GET['q'] ?? "";

$search = strtolower($search);

$products = [];

if (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] === 'application/json') {
    header('Content-Type: application/json');
    if (empty($search)) {
        echo json_encode([]);
    } else {
        $conn->query("SELECT product.*, MAX(product_image.image_url) AS image_url FROM product LEFT JOIN product_image ON product.id = product_image.product_id WHERE lower(product.name) LIKE '%$search%' OR lower(product.description) LIKE '%$search%' GROUP BY product.id;");

        $products = $conn->fetch_all();
        echo json_encode($products);
    }
    exit;
}
