<tr>
    <td class="flex items-center gap-4 py-6">
        <img src="<?= $order['image_url'] ?? "/public/favicon.ico" ?>" alt="<?= $product['name'] ?>" class="h-20 w-20 rounded-lg object-cover">
        <div>
            <h3 class="text-lg font-semibold text-black dark:text-white"><?= $product['name'] ?></h3>
            <p class="text-base font-normal text-gray-400 dark:text-gray-400"><?= $category['name'] ?></p>
        </div>
    </td>
    <td class="text-base font-normal text-gray-600 dark:text-white">
        <?= number_format($product['price'], 0, "", ",") ?> đ
    </td>
    <td class="text-base font-normal text-gray-600 dark:text-white">
        <input type="hidden" name="product[<?= $index ?>][id]" value="<?= $product['id'] ?>">
        <div class="w-fit rounded-lg border border-gray-200 bg-white dark:border-neutral-700 dark:bg-neutral-900" data-hs-input-number='{"min": 1}'>
            <div class="flex w-fit items-center justify-between">
                <div class="px-3 py-2">
                    <input class="border-0 bg-transparent p-0 text-gray-800 focus:ring-0 dark:text-white" type="number" name="product[<?= $index ?>][quantity]" value="<?= $order['quantity'] ?>" data-hs-input-number-input="">
                </div>
                <div class="-gap-y-px flex flex-col divide-y divide-gray-200 border-s border-gray-200 dark:divide-neutral-700 dark:border-neutral-700">
                    <button type="button" class="inline-flex size-7 items-center justify-center gap-x-2 rounded-se-lg bg-gray-50 text-sm font-medium text-gray-800 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700" data-hs-input-number-decrement="">
                        <?php Icon("minus", "stroke-black dark:stroke-white size-4"); ?>
                    </button>
                    <button type="button" class="inline-flex size-7 items-center justify-center gap-x-2 rounded-ee-lg bg-gray-50 text-sm font-medium text-gray-800 hover:bg-gray-100 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700" data-hs-input-number-increment="">
                        <?php Icon("plus", "stroke-black size-4"); ?>
                    </button>
                </div>
            </div>
        </div>
    </td>
    <td class="text-base font-normal text-gray-600 dark:text-white">
        <?= number_format($order['quantity'] * $product['price'], 0, "", ",") ?> đ
    </td>
</tr>