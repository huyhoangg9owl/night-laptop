<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-4 mb-6">
    <?php
    $current_products = count($products);
    $start = ($page - 1) * $show_mode;
    $end = $page * $show_mode;
    if ($end > $current_products) {
        $end = $current_products;
    }

    for ($i = $start; $i < $end; $i++) {
        $product = $products[$i];
    ?>
        <div class="bg-white dark:bg-black/50 p-2 rounded-lg shadow-lg">
            <img src="<?= $product['thumbnail'] ?>" alt="<?= $product['title'] . " - " . $product['description'] ?>" class="w-full h-48 object-cover rounded-lg select-none" draggable="false">
            <div class="w-full flex flex-row items-center justify-between mt-2 font-medium text-gray-300">
                <p>
                    4.5 <span>
                        <?php
                        $name_icon = "star";
                        $class_icon = "text-yellow-300";
                        require ROOT_PATH . "/components/icons/index.php";
                        ?>
                    </span>
                </p>
                <p>
                    <?= $product['rating'] ?> Đánh giá
                </p>
            </div>
            <h2 class="text-sm font-semibold line-clamp-2 mt-2 mb-4">
                <?= $product['title'] ?>
            </h2>
            <p class="text-xs text-gray-500 line-through italic <?= empty($product['discountPercentage']) ? "opacity-0" : "" ?>">
                <?= "$" . $product['price'] ?>
            </p>
            <p class="text-lg font-semibold">
                <?= "$" . $product['price'] - ($product['discountPercentage'] ? $product['discountPercentage'] : 0) ?>
            </p>
        </div>
    <?php } ?>
</div>