<?php
$image = $conn->query("SELECT * FROM product_image WHERE product_id = {$value['id']} AND is_thumbnail = 1");
$image = $conn->fetch_once();
?>

<a href='/product/<?= $value['id'] ?>' data-name='carousel-item' class="h-full">
    <div class='min-w-36 h-full flex flex-col z-40 whitespace-nowrap rounded overflow-hidden bg-white dark:bg-zinc-600 relative transition-transform hover:-translate-y-2' data-props='<?= $key ?>'>
        <img src='<?= $image['image_url'] ?? "/public/favicon.ico" ?>' alt='<?= $value['name'] ?>' class='w-full border-b' draggable='false' />
        <div class="absolute top-2 left-2 rounded-sm">
            <p class='text-green-500 text-xs p-1 font-bold'>Còn hàng</p>
        </div>
        <div class="flex flex-col items-start w-full h-full whitespace-normal p-2">
            <ul class="w-full text-xs flex flex-row items-center justify-between">
                <li class="flex flex-row items-center justify-center">
                    <p class="inline-block font-bold">
                        0
                    </p>
                    <?php Icon("star", "text-yellow-300"); ?>
                </li>
                <li>
                    <p class="font-medium">
                        0 Đánh giá
                    </p>
                </li>
            </ul>
            <h2 class="text-sm font-semibold line-clamp-2 mt-2 mb-2">
                <?= $value['name'] ?>
            </h2>
            <p class="text-lg font-semibold">
                <?= number_format($value['price'], 0, "", ",") ?> đ
            </p>
        </div>
    </div>
</a>