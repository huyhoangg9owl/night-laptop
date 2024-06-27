<?php
function StatusColor($status)
{
    switch ($status) {
        case 0:
            return 'text-red-500';
        case 1:
            return 'text-yellow-500';
        case 2:
            return 'text-blue-500';
        case 3:
            return 'text-green-500';
    }
}
?>

<form action="/services/admin/order" method="post" class="w-full overflow-x-auto">
    <button type="submit" name="update" class="my-6 px-4 py-3 rounded-lg text-white font-semibold bg-green-400">Cập nhật</button>
    <table class="w-full border-separate divide-y divide-gray-200">
        <thead class="bg-gray-50">
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
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark ">
                        <?= $order['name_reciver'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark ">
                        <?= $order['name'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark text-center">
                        <?= $order['created_at'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark text-center">
                        <?= number_format($order['total']) ?> đ
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark text-center">
                        <select name="status[<?= $order['id'] ?>]" class="px-4 py-2 rounded-lg font-semibold bg-transparent border border-slate-200 <?= StatusColor($order['status']) ?>">
                            <option value="0" <?= $order['status'] == 0 ? 'selected' : '' ?>>Đã hủy</option>
                            <option value="1" <?= $order['status'] == 1 ? 'selected' : '' ?>>Đang chờ xử lý</option>
                            <option value="2" <?= $order['status'] == 2 ? 'selected' : '' ?>>Đang giao hàng</option>
                            <option value="3" <?= $order['status'] == 3 ? 'selected' : '' ?>>Đã giao hàng</option>
                        </select>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>