<article class="col-span-7 w-full bg-gray-100 p-6 dark:bg-black/20">
    <form method="post" action="/services/account/cart/update">
        <h2 class="font-manrope border-b border-gray-300 pb-8 text-3xl font-bold leading-10 text-black dark:text-white">
            Giỏ hàng</h2>
        <table class="mt-6 w-full border-b border-gray-300">
            <thead>
                <tr class="text-left">
                    <th class="text-base font-normal text-gray-600 dark:text-gray-400">Sản phẩm</th>
                    <th class="text-base font-normal text-gray-600 dark:text-gray-400">Giá</th>
                    <th class="text-base font-normal text-gray-600 dark:text-gray-400">Số lượng</th>
                    <th class="text-base font-normal text-gray-600 dark:text-gray-400">Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach ($cart as $order) {
                    $product = $Product->getProductById($order['product_id']);
                    $category = $Product->getProductCategory($product['category_id']);
                    require ROOT_PATH . "/layouts/account/article/cart/list/item.php";
                    $index++;
                }; ?>
            </tbody>
        </table>

        <div class="ml-auto mt-6 w-fit">
            <button class="mr-4 rounded-xl bg-green-600 px-6 py-3 text-center text-lg font-semibold text-white transition-all duration-500 hover:bg-green-700" type="submit">
                Cập nhật
            </button>
            <button class="rounded-xl bg-gray-600 px-6 py-3 text-center text-lg font-semibold text-white transition-all duration-500 hover:bg-gray-700" type="reset">
                Hủy
            </button>
        </div>
    </form>
</article>