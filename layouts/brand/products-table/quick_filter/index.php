<div class="flex justify-center items-center mb-4 ml-auto gap-4">
    <h1 class="font-medium mr-auto text-4xl madimi-one-regular">
        <?= $brand["name"] . " [" . count($products) . "]" ?>
    </h1>
    <?php
    require_once ROOT_PATH . "/layouts/brand/products-table/quick_filter/sort_by.php";
    require_once ROOT_PATH . "/layouts/brand/products-table/quick_filter/show_mode.php";
    require_once ROOT_PATH . "/layouts/brand/products-table/quick_filter/view_mode.php";
    ?>
</div>