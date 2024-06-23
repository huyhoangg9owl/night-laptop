<?php
$carousel = $carousel ?? [];
$name_carousel = $name_carousel ?? "";
$default_carousel_config = [
    "indicators" => true,
    "controls" => true,
    "items_model" => null,
    "carousel_css" => ""
];

$carousel_config = array_merge($default_carousel_config, $carousel_config ?? []);
?>

<section data-name="<?= $name_carousel ?>-carousel" class="group/<?= $name_carousel ?> relative w-full select-none overflow-hidden rounded-md">
    <button data-name="action-prev" class="group-hover/<?= $name_carousel ?>:opacity-100 absolute left-5 top-1/2 z-50 h-20 w-10 -translate-y-1/2 rounded-lg bg-zinc-600/40 opacity-0 transition-all ease-linear active:scale-[85%]">
        <?php if ($carousel_config["controls"]) Icon("prev_arrow", "m-auto fill-white"); ?>
    </button>
    <div class="relative overflow-hidden">
        <div data-name="carousel-items" class="grid-cols-[repeat(<?= count($carousel) ?>,1fr)] <?= $carousel_config['carousel_css'] ?> grid h-full w-fit whitespace-nowrap transition-transform duration-200">
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
        <ul class="absolute bottom-2 left-1/2 z-50 -translate-x-1/2">
            <?php
            foreach ($carousel as $key => $value) {
            ?>
                <li data-name="carousel-indicator" class="mx-1 inline-block h-1 w-8 cursor-pointer rounded-full bg-white/40 transition-colors duration-700" data-index="<?= $key ?>"></li>
            <?php
            }
            ?>
        </ul>
    <?php
    }
    ?>
    <button data-name="action-next" class="group-hover/<?= $name_carousel ?>:opacity-100 absolute right-5 top-1/2 z-50 h-20 w-10 -translate-y-1/2 rounded-lg bg-zinc-600/40 opacity-0 transition-all ease-linear active:scale-[85%]">
        <?php if ($carousel_config["controls"]) Icon("next_arrow", "m-auto fill-white"); ?>
    </button>
</section>