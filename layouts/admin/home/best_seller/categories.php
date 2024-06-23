<table class="w-full divide-y divide-gray-200 dark:divide-gray-700 rounded-lg overflow-hidden shadow-md">
    <thead class="bg-gray-50 dark:bg-gray-800">
        <tr>
            <th scope="col" colspan="3" class="py-3.5 px-4 text-xl font-normal text-black dark:text-white text-center border-b dark:border-b-gray-700">
                Danh mục bán chạy nhất
            </th>
        </tr>
        <tr>
            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-left">
                Tên
            </th>
            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                Số lượng sản phẩm
            </th>
            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">Số đơn hàng</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
        <?php foreach ($best_seller_categories as $key => $item) : ?>
            <tr>
                <td class="px-12 py-4 text-sm font-medium">
                    <div class="flex flex-col items-start justify-center">
                        <h2 class="font-medium text-gray-800 dark:text-white text-left max-w-full"><?= $item['name'] ?></h2>
                    </div>
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <p class="text-gray-800 dark:text-white text-center"><?= number_format($item['total_product']) ?></p>
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <p class="text-gray-800 dark:text-white text-center"><?= $number_format($item['sold']) ?></p>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>