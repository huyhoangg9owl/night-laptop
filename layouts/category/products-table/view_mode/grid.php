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
        $product_thumbnail = $Product->getProductThumbnail($product['id']);
    ?>
        <a href='/product/<?= $product['id'] ?>' class="bg-white dark:bg-black/50 p-2 rounded-lg shadow-lg hover:-translate-y-2 transition-transform duration-300">
            <img src="<?= $product_thumbnail ? $product_thumbnail['image_url'] : "/public/favicon.ico" ?>" alt="<?= $product['name'] ?>" class="w-full h-48 object-cover rounded-lg select-none" draggable="false">
            <div class="w-full flex flex-row items-center justify-between mt-2 font-medium text-gray-600">
                <p>
                    4.5 <span>
                        <?php Icon("star", "text-yellow-300"); ?>
                    </span>
                </p>
                <p>
                    <?= $product['rating'] ?? 0 ?> Đánh giá
                </p>
            </div>
            <h1 class="text-xl font-semibold line-clamp-2 mt-2 mb-2">
                <?= $product['name'] ?>
            </h1>
            <p class="text-md font-semibold">
                <?= number_format($product['price'], 0, "", ",") ?> đ
            </p>
        </a>
    <?php } ?>
</div>