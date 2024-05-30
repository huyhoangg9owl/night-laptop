<?php
$tabs = [
    "/" => "Tất cả",
    "/confirm" => "Chờ xác nhận",
    "/shipping" => "Đang vận chuyển",
    "/shipped" => "Đã giao hàng",
    "/cancel" => "Đã hủy"
];

$currentTab = $_SERVER['REQUEST_URI'];
$currentTab = str_replace("/admin/order", "", $currentTab);
$currentTab = $currentTab == "" ? "/" : $currentTab;
?>


<h1 class="font-normal text-3xl text-gray-600 be-vietnam-pro-black">Đơn hàng</h1>

<article class="w-full mt-6 rounded-lg shadow overflow-hidden">
    <?php
    require_once ROOT_PATH . "/layouts/admin/order/tab.php";
    ?>
    <div class="w-full">
        <?php
        require_once ROOT_PATH . "/layouts/admin/order/header.php";
        require_once ROOT_PATH . "/layouts/admin/order/item-tab.php";
        ?>
    </div>
</article>