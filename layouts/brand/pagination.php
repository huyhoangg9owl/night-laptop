<?php
$pagination_pages = ceil(count($products) / $show_mode);
if ($pagination_pages - 3 >= 0) {
?>
    <div class="w-full flex flex-row items-center justify-center gap-2 [&>button]:px-2 [&>button]:py-2">
        <button type="submit" name="page" value="<?= $prev_page ?>" class="rounded-md [&:hover>svg]:fill-sky-400">
            <?php
            $name_icon = "prev_arrow";
            $class_icon = "!w-3 !h-3 fill-black dark:fill-white transition-colors";
            require ROOT_PATH . "/components/icons/index.php";
            ?>
        </button>
        <?php
        if ($page <= $pagination_pages - 3) {
            for ($i = ($page - 2 < 0 ? 0 : $page - 2); $i < 3 + $page - ($page === 1 ? 1 : 2); $i++) {
                $item = $products[$i];
                if ($i < $pagination_pages - 3) {
        ?>
                    <button type="submit" name="page" value="<?= $item['id'] ?>" class="rounded-md text-<?= $page === $item['id'] ? "blue-400 font-bold" : "gray-700" ?> hover:!text-sky-400 dark:text-<?= $page === $item['id'] ? "blue-600 font-bold" : "gray-300" ?> hover:font-medium transition-all duration-300">
                        <?= $item['id'] ?>
                    </button>
            <?php
                }
            }
        }
        if ($page < $pagination_pages - 4) {
            ?>
            <div>...</div>
        <?php
        }
        for ($i = $pagination_pages - 3; $i < $pagination_pages; $i++) {
            $item = $products[$i];
        ?>
            <button type="submit" name="page" value="<?= $item['id'] ?>" class="rounded-md text-<?= $page === $item['id'] ? "blue-400 font-bold" : "gray-700" ?> hover:!text-sky-400 dark:text-<?= $page === $item['id'] ? "blue-600 font-bold" : "gray-300" ?> hover:font-medium transition-all duration-300">
                <?= $item['id'] ?>
            </button>
        <?php
        }
        ?>
        <button type="submit" name="page" value="<?= $next_page ?>" class="rounded-md [&:hover>svg]:fill-sky-400">
            <?php
            $name_icon = "next_arrow";
            $class_icon = "!w-3 !h-3 fill-black dark:fill-white transition-colors";
            require ROOT_PATH . "/components/icons/index.php";
            ?>
        </button>
    </div>
<?php } ?>