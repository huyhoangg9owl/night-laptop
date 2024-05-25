<?php
for ($i = 0; $i < 100; $i++) {
    $order = [
        'order_id' => 'DH' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
        'customer_name' => generateRandomName(),
        'order_product' => generateRandomProduct(),
        'order_date' => generateRandomDate(),
        'order_status' => generateRandomStatus(),
        'order_total' => generateRandomTotal()
    ];
    $orders[] = $order;
}

function generateRandomName()
{
    $names = ['John Doe', 'Jane Smith', 'Michael Johnson', 'Emily Davis'];
    return $names[array_rand($names)];
}

function generateRandomAvatar()
{
    $avatars = [
        'https://via.placeholder.com/150',
        'https://via.placeholder.com/150',
        'https://via.placeholder.com/150',
        'https://via.placeholder.com/150'
    ];
    return $avatars[array_rand($avatars)];
}

function generateRandomProduct()
{
    $products = ['iPhone 13', 'Samsung Galaxy S21', 'Google Pixel 6', 'OnePlus 9'];
    return $products[array_rand($products)];
}

function generateRandomImage()
{
    $images = [
        'https://via.placeholder.com/150',
        'https://via.placeholder.com/150',
        'https://via.placeholder.com/150',
        'https://via.placeholder.com/150'
    ];
    return $images[array_rand($images)];
}

function generateRandomDate()
{
    $startDate = strtotime('2021-01-01');
    $endDate = strtotime('2021-12-31');
    $randomTimestamp = mt_rand($startDate, $endDate);
    return date('Y-m-d', $randomTimestamp);
}

function generateRandomStatus()
{
    $statuses = ['Đã giao hàng', 'Đang vận chuyển', 'Chưa giao hàng'];
    return $statuses[array_rand($statuses)];
}

function generateRandomTotal()
{
    return rand(100000, 1000000);
}

$orders = array_slice($orders, 0, 10);
?>

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
                    Trạng thái
                </th>
                <th scope="col" class="whitespace-nowrap py-3.5 text-sm font-normal text-gray-500 dark:text-gray-400 text-center">
                    Tổng tiền
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white text-center">
                        <?= $order['order_id'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white">
                        <?= $order['customer_name'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white">
                        <?= $order['order_product'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white text-center">
                        <?= $order['order_date'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white text-center">
                        <?= $order['order_status'] ?>
                    </td>
                    <td class="whitespace-nowrap px-12 py-4 text-sm font-normal text-dark dark:text-white text-center">
                        <?= number_format($order['order_total']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>