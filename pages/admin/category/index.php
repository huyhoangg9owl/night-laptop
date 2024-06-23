<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Category.php";

$account = new Account();
$category = new Category();
$account = $account->getAccountProfile();

if ($account) {
    $role = $account['role'];
    if ($role) {
        $categories = $category->getCategories(false);
        $body_component = ROOT_PATH . '/layouts/admin/category/index.php';
        require_once ROOT_PATH . '/components/template/admin/index.php';
    } else {
        header("Location: /not-found");
        exit();
    }
} else {
    header("Location: /not-found");
    exit();
}
