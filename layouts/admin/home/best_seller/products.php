<table class="w-full divide-y divide-gray-200 rounded-lg overflow-hidden shadow-md">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" colspan="4" class="py-3.5 px-4 text-xl font-normal text-black  text-center border-b dark:border-b-gray-700">
                Sản phẩm bán chạy nhất
            </th>
        </tr>
        <tr>
            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-left">
                Tên
            </th>
            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                Giá
            </th>
            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">Đã bán</th>
            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">Tổng</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        <?php foreach ($best_seller_products as $key => $item) : ?>
            <tr>
                <td class="px-12 py-4 text-sm font-medium">
                    <h2 class="font-medium text-gray-800 text-left max-w-full">
                        <?= $item['name'] ?>
                    </h2>
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <p class="text-gray-800 text-center"><?= number_format($item['price']) ?> đ</p>
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <p class="text-gray-800 text-center"><?= $number_format($item['sold']) ?></p>
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <p class="text-gray-800 text-center"><?= number_format($item['profit']) ?> đ</p>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>