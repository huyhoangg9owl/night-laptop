<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
session_unset();

require_once "../../../config/config.php";
require_once ROOT_PATH . "/utils/Category.php";

$category = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    if ($category->getCategoryById($id)) {
        $category->deleteCategory($id);
    }
    header("Location: /admin/category");
}

session_write_close();
exit();
