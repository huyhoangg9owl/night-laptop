<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
session_unset();

require_once "../../../config/config.php";
require_once ROOT_PATH . "/utils/Category.php";

$category = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $id = $_GET['id'];
    $_SESSION['name'] = $name;

    if (!$category->getCategoryById($id)) {
        $error = "Không tồn tại danh mục";
        $_SESSION['error'] = $error;
        header("Location: /admin/category/edit/$id");
        exit();
    }

    if ($category->getCategoryByName($name)) {
        $error = "Tên danh mục đã tồn tại";
        $_SESSION['error'] = $error;
        header("Location: /admin/category/edit/$id");
        exit();
    }

    if ($category->getCategoryBySlug($name)) {
        $error = "Slug danh mục đã tồn tại";
        $_SESSION['error'] = $error;
        header("Location: /admin/category/edit/$id");
        exit();
    }

    if ($category->updateCategory($id, $name)) {
        session_unset();
        header("Location: /admin/category");
    } else {
        $error = $category->error;
        $_SESSION['error'] = $error;
        header("Location: /admin/category/create");
    }
}

session_write_close();
exit();
