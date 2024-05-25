<?php
$routes = [
    "home" => "Trang chủ",
    "category" => "Danh mục",
    "product" => "Sản phẩm",
    "order" => "Đơn hàng",
    "account" => "Tài khoản",
]; ?>

<aside class="sticky left-0 top-0 flex h-full w-60 flex-col items-start justify-between rounded-l-2xl bg-white pb-6 pt-10 shadow-2xl max-lg:w-28 rounded-2xl px-6">
    <ul class="flex h-fit w-full flex-col items-center justify-center gap-2">
        <?php
        $currentRoute = explode("/", $_SERVER["REQUEST_URI"]);
        $isFocused = count($currentRoute) > 2 ? $currentRoute[2] : "home";
        foreach ($routes as $route => $name) { ?>
            <li class="group/route relative w-fit">
                <a href="/admin<?= $route === "home" ? "" : ("/" . $route) ?>" class="flex h-12 w-fit flex-row items-center justify-center gap-4 rounded-xl pl-4 pr-8 hover:bg-gray-100 max-lg:px-0 max-lg:w-12">
                    <?php
                    $class = "fill-gray-500 group-hover/route:fill-gray-700 " . ($route === $isFocused ? "fill-gray-700" : "");
                    Icon($route, $class);
                    ?>
                    <p class="text-nowrap text-gray-500 group-hover/route:font-normal group-hover/route:text-gray-700 max-lg:hidden"><?= $name ?></p>
                </a>
            </li>
        <?php }
        ?>
    </ul>
    <div class="w-full flex flex-col items-center justify-center">
        <!-- <?php
                $class = "w-full flex flex-row items-center justify-center gap-4";
                $child = "
            <span class='text-sm max-lg:hidden'>Đổi chế độ</span>
        ";
                require_once ROOT_PATH . "/components/toggle_theme.php";
                ?> -->
        <ul class="flex w-full flex-row items-center justify-between mt-4 max-lg:flex-col-reverse max-lg:gap-6">
            <li>
                <img src="<?= $account["avatar"] ?? "/assets/images/default-avatar.png" ?>" alt="" class="size-12 rounded-full" />
            </li>
            <li>
                <a href="/admin/setting">
                    <?php
                    $class =
                        "fill-gray-500 group-hover/route:fill-gray-700 " .
                        ("setting" === $isFocused ? "fill-gray-700" : "");
                    Icon("setting", $class);
                    ?>
                </a>
            </li>
        </ul>
    </div>
</aside>