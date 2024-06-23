<?php
$pathname = $_SERVER["REQUEST_URI"];
$pathname = explode("/", $pathname);

$pathname = array_filter($pathname, fn ($item) => $item !== "");

$pathname = array_pop($pathname);

$routes = [
    [
        "path" => null,
        "title" => "Trang chủ",
        "icon" => "home"
    ],
    [
        "path" => "category",
        "title" => "Danh mục",
        "icon" => "category"
    ],
    [
        "path" => "product",
        "title" => "Sản phẩm",
        "icon" => "product"
    ],
    [
        "path" => "order",
        "title" => "Đơn hàng",
        "icon" => "cart"
    ],
    [
        "path" => "discount",
        "title" => "Khuyến mãi",
        "icon" => "discount"
    ]
];
?>

<nav class="sticky top-0 left-0 w-full h-dvh bg-orange-500 dark:bg-violet-800 p-4 flex flex-col row-span-full col-span-1">
    <a href="/admin"><img src="/public/favicon.ico" alt="Logo" class="w-full rounded-lg" draggable="false"></a>
    <ul class="mt-12 mx-auto w-full flex flex-col items-center justify-start gap-4">
        <?php foreach ($routes as $route) : ?>
            <li>
                <a href="/admin/<?= $route["path"] ?>" title="<?= $route["title"] ?>" class="bg-white<?= empty($route['path']) && $pathname === "admin" || $pathname === $route['path'] ? "" : "/70" ?> hover:bg-white duration-300 size-10 flex flex-col items-center justify-center rounded-md transition-colors">
                    <?php Icon($route["icon"], "fill-orange-500 dark:fill-violet-800 !size-5"); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="mx-auto mt-auto flex flex-col items-center justify-center gap-4">
        <li>
            <?php
            require_once ROOT_PATH . '/components/toggle_theme.php';
            ?>
        </li>
        <li>
            <a href="/admin/setting/general" title="Cài đặt" class="bg-white<?= $pathname !== "setting" ? "/70" : "" ?> hover:bg-white duration-300 size-10 flex flex-col items-center justify-center rounded-md transition-colors">
                <?php Icon("gear", "fill-orange-500 dark:fill-violet-800 size-5"); ?>
            </a>
        </li>
    </ul>
</nav>