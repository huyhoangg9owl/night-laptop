<?php
$categories = $brand['categories'];
$category_params = [];
$colors_params = [];
$price_range_param = 0;


if (isset($_GET['category'])) {
    $category_params = $_GET['category'];
}

if (isset($_GET['price_range'])) {
    $price_range_param = (int) $_GET['price_range'];
}

if (isset($_GET['color'])) {
    $colors_params = $_GET['color'];
}

?>

<div class="w-full h-full xl:w-1/4 px-4 mb-6 xl:mb-0">
    <div class="bg-white p-4 rounded-lg shadow-lg dark:bg-black/40">
        <h2 class="text-2xl text-center font-bold">Bộ Lọc</h2>
        <span class="block w-4/5 h-[1px] bg-gray-400 mx-auto mt-2 mb-4"></span>
        <a href="/brand/<?= $brand['slug'] ?>"
            class="text-center transition-colors mx-auto mb-6 block py-2 w-3/4 rounded-full border-gray-200 border-2 dark:border-gray-600 text-gray-400 dark:text-gray-600 hover:text-black dark:hover:text-white hover:border-rose-400 dark:hover:border-red-600">Xóa
            bộ lọc</a>
        <ul class="list-none p-0 m-0">
            <li class="mb-2">
                <?php
                require_once "categories.php";
                ?>
            </li>
            <li class="mb-2">
                <?php
                require_once "price_range.php";
                ?>
            </li>
            <li class="mb-2">
                <?php
                require_once "colors.php";
                ?>
            </li>
        </ul>
        <input type="submit" value="Áp dụng"
            class="cursor-pointer transition-colors mx-auto mb-6 block py-2 w-3/4 rounded-full font-bold bg-blue-400 text-white/80 hover:bg-blue-600 hover:text-white mt-8">
    </div>
</div>