<?php
$path_url = $_SERVER["REQUEST_URI"];

$url_aside = [
    "/account" => "Thông tin tài khoản",
    "/account/cart" => "Giỏ hàng",
    "/account/order" => "Đơn hàng",
    "/account/settings" => "Cài đặt",
];

$layout_article = [
    "/account" => "/index.php",
    "/account/payment" => "/payment.php",
    "/account/cart" => "/cart/index.php",
    "/account/order" => "/order/index.php",
    "/account/settings" => "/settings.php",
];
?>

<main class="w-full min-h-full p-8 flex flex-col xl:flex-row gap-4">
    <?php
    require_once ROOT_PATH . "/layouts/account/aside.php";
    ?>
    <article class="w-full h-full">
        <?php
        require_once ROOT_PATH . "/layouts/account/article" . $layout_article[$path_url];
        ?>
    </article>
</main>