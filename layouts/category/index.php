<?php
$show_mode = (int) $show_mode;
$page = (int) $page;

$prev_page = $page - 1 <= 0 ? 1 : $page - 1;
$next_page = $page + 1 >= ceil(count($products) / $show_mode) ? ceil(count($products) / $show_mode) : $page + 1;
?>
<main class="w-full min-h-dvh relative p-4 container mx-auto">
    <form method="get" class="flex flex-wrap -mx-4 mt-8">
        <?php require_once ROOT_PATH . "/layouts/category/filter/index.php" ?>
        <div class="w-full xl:w-3/4 px-4">
            <?php
            require_once ROOT_PATH . "/layouts/category/products-table/quick_filter/index.php";
            ?>
            <div class="bg-white p-4 rounded-lg shadow-lg dark:bg-black/40">
                <?php
                require_once ROOT_PATH . "/layouts/category/products-table/view_mode/grid.php";
                require_once ROOT_PATH . "/layouts/category/pagination.php";
                ?>
            </div>
        </div>
    </form>
</main>