<div class="w-full mb-28">
    <h3 class="font-semibold text-2xl text-gray-900 dark:text-white">Đánh giá sản phẩm</h3>
    <?php
    require_once ROOT_PATH . "/layouts/product/review/total.php";
    if ($account) require_once ROOT_PATH . "/layouts/product/review/write.php";
    ?>
    <div class="w-full mt-8">
        <h4 class="font-semibold text-xl text-gray-900 dark:text-white">Đánh giá của người dùng</h4>
        <div class="w-full mt-4">
            <?php
            require_once ROOT_PATH . "/layouts/product/review/list.php";
            ?>
        </div>
    </div>
</div>