<div class="grid grid-cols-1 gap-4 mb-6">
    <?php
    $current_products = count($products);
    $start = ($page - 1) * $show_mode;
    $end = $page * $show_mode;
    if ($end > $current_products) {
        $end = $current_products;
    }
    for ($i = $start; $i < $end; $i++) {
        $product = $products[$i];
        $product_thumbnail = $Product->getProductThumbnail($product['id']);
    ?>
        <div class="bg-white dark:bg-black/50 p-4 rounded-lg shadow-lg flex flex-row items-center justify-start">
            <img src="<?= $product_thumbnail['image_url'] ?? "/public/favicon.ico" ?>" alt="<?= $product['name'] ?>" class="h-48 object-cover rounded-lg mr-4">
            <div class="h-full w-full">
                <h3 class="text-lg font-medium mt-2">
                    <?= $product['name'] ?>
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mt-1">
                    <?= number_format($product['price'], 0, '', ',') ?> đ
                </p>
            </div>
        </div>
    <?php } ?>
</div>