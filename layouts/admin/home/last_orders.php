<div class="w-full overflow-x-auto shadow-md mt-8 rounded-xl">
    <table class="w-full border-separate divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th scope="col" colspan="6" class="whitespace-nowrap py-3.5 px-4 text-xl font-normal text-black dark:text-white text-center">
                    Đơn hàng gần nhất
                </th>
            </tr>
            <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                    Mã đơn hàng
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                    Khách hàng
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                    Sản phẩm
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                    Ngày đặt hàng
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                    Tổng tiền
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                    Trạng thái
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white text-center">
                        <?= $order['id'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white">
                        <?= $order['name_reciver'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white">
                        <?= $order['name'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white text-center">
                        <?= $order['created_at'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white text-center">
                        <?= number_format($order['total']) ?> đ
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white text-center">
                        <?php switch ($order['status']):
                            case 0: ?>
                                <span class="text-red-500">Đã hủy</span>
                                <?php break; ?>
                            <?php
                            case 1: ?>
                                <span class="text-yellow-500">Đang chờ xử lý</span>
                                <?php break; ?>
                            <?php
                            case 2: ?>
                                <span class="text-blue-500">Đang giao hàng</span>
                                <?php break; ?>
                            <?php
                            case 3: ?>
                                <span class="text-green-500">Đã giao hàng</span>
                                <?php break; ?>
                            <?php
                            default: ?>
                                <span class="text-red-500">Đã hủy</span>
                        <?php endswitch; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>