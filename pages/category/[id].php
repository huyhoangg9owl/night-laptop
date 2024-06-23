<?php
require_once ROOT_PATH . '/utils/Category.php';
require_once ROOT_PATH . '/utils/Product.php';

global $conn, $router;

$categories = new Category();
$Product = new Product();

$params = $router->getParams();
$category = null;

$category = $categories->getCategoryBySlug($params['id']);

if (empty($category)) {
    header("Location: /not-found");
    exit;
}

$subtitle = strtoupper($params['id']);

$sort_by_options = [
    'newest' => 'Mới nhất',
    'oldest' => 'Cũ nhất',
    'price-low' => 'Giá từ thấp đến cao',
    'price-high' => 'Giá từ cao đến thấp',
];

$show_mode_options = [10, 20, 40, 60];

$view_mode_options = ['grid'];

if (isset($_GET)) {
    $sort_by = !empty($_GET['sort_by']) ? $_GET['sort_by'] : array_keys($sort_by_options)[0];
    $show_mode = !empty($_GET['show_mode']) ? $_GET['show_mode'] : $show_mode_options[0];
    $view_mode = !empty($_GET['view_mode']) ? $_GET['view_mode'] : $view_mode_options[0];
    $page = !empty($_GET['page']) ? $_GET['page'] : 1;
}

if (
    !in_array($sort_by, array_keys($sort_by_options)) ||
    !in_array($show_mode, $show_mode_options) ||
    !in_array($view_mode, $view_mode_options)
) {
    header("Location: /not-found");
    exit;
}

$conn->query("SELECT * FROM product WHERE category_id = ? ORDER BY created_at DESC", [$category['id']]);

$products = $conn->fetch_all();

$body_component = ROOT_PATH . '/layouts/category/index.php';
require_once ROOT_PATH . '/components/template/global/index.php';
