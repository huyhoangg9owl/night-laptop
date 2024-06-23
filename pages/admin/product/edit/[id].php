<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Product.php";
require_once ROOT_PATH . "/utils/Category.php";

global $router;

$account = new Account();
$Product = new Product();
$category = new Category();

$account = $account->getAccountProfile();

if ($account) {
    $role = $account['role'];
    if ($role) {
        $params = $router->getParams();
        $id = $params['id'];
        if (is_numeric($id)) {
            $id = intval($id);
            $product = $Product->getProductById($id);
            if ($product) {
                $product_images = $Product->getProductImages($id);
                $product_thumbnail = $Product->getProductThumbnail($id);
                $categories = $category->getCategories();
                $name = $product['name'];
                $subtitle = "Edit Category";
                $body_component = ROOT_PATH . '/layouts/admin/product/edit.php';
                require_once ROOT_PATH . '/components/template/admin/index.php';
            } else {
                header("Location: /not-found");
                exit();
            }
        } else {
            header("Location: /not-found");
            exit();
        }
    } else {
        header("Location: /not-found");
        exit();
    }
} else {
    header("Location: /not-found");
    exit();
}
