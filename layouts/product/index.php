<?php
$product_image = $Product->getProductThumbnail($product['id']);
$category = $Product->getProductCategory($product['category_id']);
?>

<main class="w-full min-h-dvh p-6">
    <?php require_once ROOT_PATH . "/layouts/product/overview.php"; ?>
    <div class="w-full mt-6">
        <?php
        require_once ROOT_PATH . "/layouts/product/description.php";
        require_once ROOT_PATH . "/layouts/product/review/index.php";
        ?>
    </div>
</main>