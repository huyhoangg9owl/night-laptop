<div class="w-full overflow-x-auto shadow-md mt-8 rounded-xl">
    <table class="w-full border-separate divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" colspan="6" class="whitespace-nowrap py-3.5 px-4 text-xl font-normal text-black text-center">
                    Đơn hàng gần nhất
                </th>
            </tr>
            <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 text-center">
                    Mã đơn hàng
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 text-center">
                    Khách hàng
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 text-center">
                    Sản phẩm
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 text-center">
                    Ngày đặt hàng
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 text-center">
                    Tổng tiền
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 text-center">
                    Trạng thái
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark text-center">
                        <?= $order['id'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark">
                        <?= $order['name_reciver'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark">
                        <?= $order['name'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark text-center">
                        <?= $order['created_at'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark text-center">
                        <?= number_format($order['total']) ?> đ
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark text-center">
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