<div class="mb-4 ml-auto flex items-center justify-center gap-4">
    <h1 class="madimi-one-regular mr-auto text-4xl font-medium">
        <?= $category["name"] . " [" . count($products) . "]" ?>
    </h1>
    <?php
    require_once ROOT_PATH . "/layouts/category/products-table/quick_filter/sort_by.php";
    require_once ROOT_PATH . "/layouts/category/products-table/quick_filter/show_mode.php";
    require_once ROOT_PATH . "/layouts/category/products-table/quick_filter/view_mode.php";
    ?>
</div>