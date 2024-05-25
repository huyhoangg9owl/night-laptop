<?php
$random = fn ($minValue, $maxValue, $minLength, $maxLength) => array_map(fn () => rand($minValue, $maxValue), range(1, rand($minLength, $maxLength)));

$ChartIncome = [
    'backgroundColor' => 'rgb(5 150 102)',
    'borderColor' => 'rgb(5 150 102)',
    'data' => $random(100000, 1000000, 4, 7)
];

$ChartProducts = [
    'backgroundColor' => 'rgb(255 193 7)',
    'borderColor' => 'rgb(255 193 7)',
    'data' => $random(100000, 1000000, 4, 7)
];

$ChartOrders = [
    'backgroundColor' => 'rgb(233 30 99)',
    'borderColor' => 'rgb(233 30 99)',
    'data' => $random(100000, 1000000, 4, 7)
];

$ChartVisitors = [
    'backgroundColor' => 'rgb(156 39 176)',
    'borderColor' => 'rgb(156 39 176)',
    'data' => $random(100000, 1000000, 4, 7)
];

$profits = $random(100000, 10000000, 6, 12);

$ChartProfit = [
    "labels" => ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"],
    "datasets" => [
        [
            "label" => 'Tổng tiền trong tháng',
            "data" => $profits,
            "backgroundColor" => array_merge(array_map(fn ($i) => "gray", range(1, count($profits) - 1)), ["rgb(255 193 7)"]),
            "borderWidth" => 0,
            "barPercentage" => 1,
            "categoryPercentage" => 1,
        ],
    ],
];

$ChartOrdersStatus = [
    'labels' => ['Chưa thanh toán', 'Đang vận chuyển', 'Đã giao hàng', 'Hoàn trả hàng'],
    'datasets' => [
        [
            "label" => 'Số lượng đơn hàng',
            "data" => $random(100, 1000, 4, 4),
            "backgroundColor" => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'orange', 'red'],
        ]
    ]
];

$ChartRevenue = [
    'labels' => ["PC", "Laptop", "Điện thoại", "Khác"],
    'datasets' => [
        [
            'data' => $random(100000, 1000000, 4, 4),
            'backgroundColor' => ["rgb(249, 115, 22)", "rgb(239, 68, 68)", "rgb(168, 85, 247)", "rgb(34, 197, 94)"],
        ]
    ]
];

function PercentColor($percent)
{
    $colors = ["text-green-500", "text-amber-500", "text-red-400", "text-red-600"];

    switch ($percent) {
        case $percent > 0:
            return $colors[0];
        case $percent == 0:
            return $colors[1];
        case $percent < -50:
            return $colors[3];
        default:
            return $colors[2];
    }
}
?>

<h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black">Trang chủ</h1>

<?php
require_once ROOT_PATH . '/layouts/admin/home/chart/index.php';
require_once ROOT_PATH . '/layouts/admin/home/best_seller/index.php';
require_once ROOT_PATH . '/layouts/admin/home/last_orders.php';
?>

<script id="pass_value">
    const random = (minValue, maxValue, minLength, maxLength) => {
        let length = Math.floor(Math.random() * (maxLength - minLength + 1) + minLength);
        let data = [];
        for (let i = 0; i < length; i++) {
            data.push(Math.floor(Math.random() * (maxValue - minValue + 1) + minValue));
        }
        return data;
    }
    const globals = {
        Home: {
            Chart: {
                mini: {
                    income: <?= json_encode($ChartIncome) ?>,
                    products: <?= json_encode($ChartProducts) ?>,
                    orders: <?= json_encode($ChartOrders) ?>,
                    visitors: <?= json_encode($ChartVisitors) ?>,
                },
                profit: <?= json_encode($ChartProfit) ?>,
                ordersStatus: <?= json_encode($ChartOrdersStatus) ?>,
                revenue: <?= json_encode($ChartRevenue) ?>,
            }
        }
    };
    document.querySelector("#pass_value").remove();
</script>