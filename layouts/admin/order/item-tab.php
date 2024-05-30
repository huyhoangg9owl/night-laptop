<?php
if (!isset($products) || empty($products)) { ?>
    <div class="w-full py-6 text-center">Chưa có sản phẩm nào</div>
    <?php } else {
    foreach ($products as $product) {
        $product_thumbnail = $Product->getProductThumbnail($product['id']);
    ?>
        <div class="grid grid-cols-[repeat(22,1fr)] py-6">
            <div class="col-span-2">
            </div>
            <div class="col-span-3 flex items-center justify-center">
                <img src="<?= $product_thumbnail ? $product_thumbnail['image_url'] : "/public/favicon.ico" ?>" alt="" class="w-20 h-20 object-cover rounded-lg">
            </div>
            <div class="col-span-3 flex items-center justify-center">
                <a href="/admin/product/1" class="hover:text-blue-500 hover:underline transition-colors duration-300">
                    <?= $product['name'] ?>
                </a>
            </div>
            <div class="col-span-3 flex items-center justify-center">
                <?= $product['quantity'] ?>
            </div>
            <div class="col-span-3 flex items-center justify-center">
                <?= number_format($product['price'], 0, '', ',') ?>
            </div>
            <div class="col-span-3 flex items-center justify-center">
                123456
            </div>
            <div class="col-span-3 flex items-center justify-center">
                <span class="text-green-500 font-medium">Còn hàng</span>
            </div>
            <label class="col-span-2 flex items-center justify-center peer">
                <input type="checkbox" class="hidden peer">
                <?php Icon("next_arrow", "-rotate-90 peer-checked:rotate-90 transition-transform duration-300"); ?>
            </label>
            <?php
            require_once ROOT_PATH . "/layouts/admin/order/item-detail.php";
            ?>
        </div>
<?php }
} ?>