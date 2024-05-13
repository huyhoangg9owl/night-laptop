<?php
global $name_carousel;
$default_carousel_config = [
    "indicators" => true,
    "controls" => true,
    "items_model" => null,
    "carousel_css" => ""
];
$carousel_config = array_merge($default_carousel_config, $carousel_config ?? []);
?>

<section data-name="<?= $name_carousel ?>-carousel"
         class="w-full relative overflow-hidden rounded-md select-none group/<?= $name_carousel ?>">
    <button data-name="action-prev"
            class="group-hover/<?= $name_carousel ?>:opacity-100 opacity-0 transition-all absolute z-50 top-1/2 -translate-y-1/2 left-5 bg-zinc-600/40 w-10 h-20 rounded-lg ease-linear active:scale-[85%]">
        <?php
        if ($carousel_config["controls"]) {
            $name_icon = "prev_arrow";
            $class_icon = "m-auto fill-white";
            require ROOT_PATH . "/components/icons/index.php";
        }
        ?>
    </button>
    <div class="relative rounded-xl overflow-hidden">
        <div data-name="carousel-items"
             class="w-fit h-full grid grid-cols-[repeat(<?= count($carousel) ?>,1fr)] whitespace-nowrap transition-transform duration-200 <?= $carousel_config["carousel_css"] ?>">
            <?php
            foreach ($carousel as $key => $value) {
                if ($carousel_config["items_model"]) {
                    require $carousel_config["items_model"];
                } else
                    echo "<a href='/news/{$value['id']}' class='inline-block z-40 whitespace-nowrap' data-name='carousel-item' title='{$value['title']}' draggable='false' data-props='{$value['id']}'>
				<img src='{$value['img']}' alt='{$value['title']}' class='h-full' draggable='false' />
			</a>";
            }
            ?>
        </div>
    </div>
    <?php
    if ($carousel_config["indicators"]) {
        ?>
        <ul class="absolute bottom-2 left-1/2 -translate-x-1/2 z-50">
            <?php
            foreach ($carousel as $key => $value) {
                ?>
                <li data-name="carousel-indicator"
                    class="w-8 h-1 bg-white/40 rounded-full inline-block mx-1 cursor-pointer transition-colors duration-700"
                    data-index="<?= $key ?>"></li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
    ?>
    <button data-name="action-next"
            class="group-hover/<?= $name_carousel ?>:opacity-100 opacity-0 transition-all absolute z-50 top-1/2 -translate-y-1/2 right-5 bg-zinc-600/40 w-10 h-20 rounded-lg ease-linear active:scale-[85%]">
        <?php
        if ($carousel_config["controls"]) {
            $name_icon = "next_arrow";
            $class_icon = "m-auto fill-white";
            require ROOT_PATH . "/components/icons/index.php";
        }
        ?>
    </button>
</section>