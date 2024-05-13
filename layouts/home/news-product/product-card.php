<?php
$number_format = require ROOT_PATH . '/lib/php/number_format.php';
?>

<div data-name='carousel-item' class="h-full">
    <div class='min-w-36 h-full flex flex-col z-40 whitespace-nowrap rounded overflow-hidden bg-white dark:bg-zinc-600 relative transition-transform hover:-translate-y-2' data-props='<?= $value['id'] ?>'>
        <img src='<?= $value['img'] ?>' alt='<?= $value['title'] ?>' class='w-full border-b' draggable='false' />
        <div class="absolute top-2 left-2 rounded-sm">
            <?php
            switch ($value["status"]) {
                case 'Available':
                    echo "<p class='text-green-500 text-xs p-1 font-bold'>Còn hàng</p>";
                    break;
                case 'Sold out':
                    echo "<p class='text-red-500 text-xs p-1 font-bold'>Hết hàng</p>";
                    break;
                case 'Pre-order':
                    echo "<p class='text-orange-500 text-xs p-1 font-bold'>Cần đặt trước</p>";
                    break;
                default:
                    break;
            }
            ?>
        </div>
        <div class="flex flex-col items-start w-full h-full whitespace-normal p-2">
            <ul class="w-full text-xs flex flex-row items-center justify-between">
                <li class="flex flex-row items-center justify-center">
                    <p class="inline-block font-bold">
                        <?= $value["rating"] ?>
                    </p><?php
                        $name_icon = "star";
                        $class_icon = "text-yellow-300";
                        require ROOT_PATH . "/components/icons/index.php";
                        ?>
                </li>
                <li>
                    <p class="font-medium">
                        <?= $number_format($value["reviews"]) ?? 0 ?> Đánh giá
                    </p>
                </li>
            </ul>
            <h2 class="text-sm font-semibold line-clamp-2 mt-2 mb-4">
                <?= $value['title'] ?>
            </h2>
            <?php
            if ($value['discount']) {
            ?>
                <p class="text-xs text-gray-500 line-through italic">
                    <?= "$" . $value['price'] ?>
                </p>
            <?php
            }
            ?>
            <div class="flex flex-row items-center justify-between w-full mt-auto">
                <p class="text-lg font-semibold">
                    <?= "$" . ($value['discount'] ? $value['discount'] : $value['price']) ?>
                </p>
                <?php
                switch ($value['status']) {
                    case "Available":
                        echo "<a href='/news/{$value['id']}' class='font-semibold px-3 py-1 rounded-full border-2 border-sky-500 text-sky-400 hover:bg-sky-500 hover:text-white'>Mua ngay</a>";
                        break;

                    case "Sold out":
                        echo "<button class='font-semibold px-3 py-1 rounded-full border-2 border-gray-300 text-gray-300 cursor-not-allowed'>Hết hàng</button>";
                        break;

                    case "Pre-order":
                        echo "<a class='font-semibold px-3 py-1 rounded-full border-2 border-orange-500 text-orange-500 cursor-help hover:bg-orange-500 hover:text-white' href='/pre-order/{$value["id"]}'>Đặt trước</a>";
                        break;

                    default:
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</div>