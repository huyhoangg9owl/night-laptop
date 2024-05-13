<?php
$brands = require_once ROOT_PATH . '/lib/php/brands.php';
$body_component = ROOT_PATH . '/layouts/brand/index.php';

$params = $GLOBALS['params'];
$brand = null;

foreach ($brands as $brand_object) {
    if ($brand_object['slug'] === $params['id']) {
        $brand = $brand_object;
        break;
    }
}

if (empty($brand)) {
    header("Location: /not-found");
    exit;
}

$subtitle = strtoupper($params['id']);

$sort_by_options = [
    'newest' => 'Newest',
    'oldest' => 'Oldest',
    'price-low' => 'Price: Low to High',
    'price-high' => 'Price: High to Low',
];

$show_mode_options = [10, 20, 40, 60];

$view_mode_options = ['grid', 'list'];

$json_data = file_get_contents('api/json/products.json');
$products = json_decode($json_data, true);

$products = array_filter($products, function ($product) use ($brand) {
    return $product['brand'] === $brand['name'];
});

$products = array_values($products);

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

require_once ROOT_PATH . '/components/template/index.php';
