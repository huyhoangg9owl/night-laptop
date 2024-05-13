<?php
global $account;
global $account_profile;
global $account_payment;
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
    "/account/cart" => "/cart.php",
    "/account/order" => "/order.php",
    "/account/settings" => "/settings.php",
];
?>

<main class="w-full min-h-full p-8 flex flex-row gap-4">
    <aside class="w-1/4 h-fit sticky top-5 left-0 bg-white dark:bg-zinc-600 p-6">
        <div class="flex flex-row items-center gap-4">
            <img loading="lazy" src="<?= $account_profile['avatar'] ?>" alt="Avatar account" class="size-20 rounded-full">
            <div class="w-full h-full">
                <h1 class="text-2xl font-bold"><?= $account["username"] ?></h1>
                <p class="text-gray-500"><?= $account["email"] ?></p>
            </div>
        </div>
        <ul class="mt-8 py-10 border-t">
            <?php
            foreach ($url_aside as $url => $title) {
                $class = $path_url === $url ? "bg-sky-500 dark:bg-sky-700 text-white font-semibold" : "text-gray-500 dark:text-gray-400 hover:bg-sky-500 hover:dark:bg-sky-700 hover:text-white hover:font-semibold transition-colors duration-500";
            ?>
                <li>
                    <a href="<?= $url ?>" class="block p-4 <?= $class ?>"><?= $title ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
        <span class="font-normal text-sm text-gray-400 italic">Shift + T để thấy bất ngờ</span>
    </aside>
    <article class="w-full h-full">
        <?php
        global $account;
        require_once ROOT_PATH . "/layouts/account/UI" . $layout_article[$path_url];
        ?>
    </article>
</main>