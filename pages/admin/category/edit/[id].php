<?php
require_once ROOT_PATH . "/utils/Account.php";
require_once ROOT_PATH . "/utils/Category.php";

global $router;

$account = new Account();
$category = new Category();

$account = $account->getAccountProfile();

if ($account) {
    $role = $account['role'];
    if ($role) {
        $params = $router->getParams();
        $id = $params['id'];
        if (is_numeric($id)) {
            $id = intval($id);
            $category = $category->getCategoryById($id);
            if ($category) {
                $name = $category['name'];
                $subtitle = "Edit Category";
                $body_component = ROOT_PATH . '/layouts/admin/category/edit.php';
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
