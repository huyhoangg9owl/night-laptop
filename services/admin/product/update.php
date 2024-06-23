<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
session_unset();

require_once "../../../config/config.php";
require_once ROOT_PATH . "/utils/Product.php";
require_once ROOT_PATH . "/utils/Category.php";
require_once ROOT_PATH . "/utils/UploadFile.php";

$product = new Product();
$category = new Category();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

    $thumbnail_image = $_FILES['thumbnail_image'];

    $description = htmlspecialchars($description);

    $_SESSION['name'] = $name;
    $_SESSION['price'] = $price;
    $_SESSION['description'] = $description;
    $_SESSION['quantity'] = $quantity;
    $_SESSION['category_id'] = $category_id;


    if (empty($name) || empty($price) || empty($description) || empty($quantity) || empty($category_id) || !isset($status)) {
        $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin";
        header("Location: /admin/product/edit/$id");
        exit();
    }

    if (!is_numeric($price) || !is_numeric($quantity)) {
        $_SESSION['error'] = "Giá và số lượng sản phẩm phải là số";
        header("Location: /admin/product/edit/$id");
        exit();
    }

    if ($price <= 0 || $quantity <= 0) {
        $_SESSION['error'] = "Giá và số lượng sản phẩm phải lớn hơn 0";
        header("Location: /admin/product/edit/$id");
        exit();
    }

    if ($category->getCategoryById($category_id) === null) {
        $_SESSION['error'] = "Danh mục sản phẩm không tồn tại";
        header("Location: /admin/product/edit/$id");
        exit();
    }

    $product->updateProduct($id, $name, $price, $description, $quantity, $category_id, $status);

    if ($product->getError()) {
        $_SESSION['error'] = $product->getError();
        header("Location: /admin/product/edit/$id");
        exit();
    }

    $upload_dir = ROOT_PATH . "/upload/product/" . hash("sha256", $name . $category_id);

    if ($thumbnail_image['error'] == 0) {
        $upload = new UploadFile($thumbnail_image);
        $upload->setUploadDir($upload_dir);
        $upload->setAllowedTypes(["image/png", "image/jpeg", "image/jpg"]);
        $upload->setMaxSize(2 * 1024 * 1024);
        $upload->setFileName(str_replace("." . pathinfo($thumbnail_image["name"], PATHINFO_EXTENSION), "", $thumbnail_image['name']));
        $path = $upload->getPath();
        try {
            $upload->upload(["width" => 750, "height" => 750]);

            if (count($product->getProductThumbnail($id) ?? [])) $conn->query("UPDATE product_image SET image_url = ? WHERE product_id = ?", [$path, $id]);
            else $conn->query("INSERT INTO product_image (product_id, image_url, is_thumbnail) VALUES (?, ?, 1)", [$id, $path]);
        } catch (Exception $e) {
            $_SESSION['error'] = "Upload ảnh bìa thất bại";
        }
    }

    if ($_SESSION['error']) {
        header("Location: /admin/product/edit/$id");
    } else {
        session_unset();
        header("Location: /admin/product");
    }
}

session_write_close();
exit();
