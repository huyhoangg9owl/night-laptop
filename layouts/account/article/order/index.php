<table class="table border-collapse border border-gray-300 w-full">
    <thead>
        <tr class="border border-gray-300">
            <th class="border border-gray-300 p-3">Mã đơn hàng</th>
            <th class="border border-gray-300 p-3">Sản phẩm</th>
            <th class="border border-gray-300 p-3">Thời gian đặt hàng</th>
            <th class="border border-gray-300 p-3">Số lượng</th>
            <th class="border border-gray-300 p-3">Tổng</th>
            <th class="border border-gray-300 p-3">Trạng thái</th>
            <th class="border border-gray-300 p-3">Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($orders)) : ?>
            <?php foreach ($orders as $key => $order) : ?>
                <tr class="border border-gray-300">
                    <td class="border border-gray-300 p-3"><?= $order['id']; ?></td>
                    <td class="border border-gray-300 p-3"><?= $order['name']; ?></td>
                    <td class="border border-gray-300 p-3"><?= $order['created_at']; ?></td>
                    <td class="border border-gray-300 p-3"><?= $order['quantity']; ?></td>
                    <td class="border border-gray-300 p-3"><?= number_format($order['total'], 0, "", ","); ?>đ</td>
                    <td class="border border-gray-300 p-3">
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
                    <td class="border border-gray-300 p-3">
                        <?php if ($order['status'] === 1) : ?>
                            <form method="get" action="/services/account/order">
                                <button type="submit" name="order_id" value="<?= $order['id'] ?>" class="text-red-300 hover:text-red-600 transition-colors duration-300 font-bold">Hủy đơn</button>
                            </form>
                        <?php else : ?>
                            <button class="text-gray-300 font-bold cursor-not-allowed">Hủy đơn</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7" class="text-center">Chưa có đơn hàng nào</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>