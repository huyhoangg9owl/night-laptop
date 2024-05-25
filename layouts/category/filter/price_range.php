<?php
$price_ranges = [
    [
        'id' => 0,
        'name' => 'Dưới 5 triệu'
    ],
    [
        'id' => 1,
        'name' => 'Từ 5 triệu tới 10 triệu'
    ],
    [
        'id' => 2,
        'name' => 'Từ 10 triệu tới 20 triệu',
    ],
    [
        'id' => 3,
        'name' => 'Từ 20 triệu tới 30 triệu',
    ],
    [
        'id' => 4,
        'name' => 'Từ 30 triệu tới 40 triệu',
    ],
    [
        'id' => 5,
        'name' => 'Từ 40 triệu tới 50 triệu',
    ],
    [
        'id' => 6,
        'name' => 'Trên 50 triệu',
    ],
];
?>

<details class="group cursor-pointer" open>
    <summary class="text-gray-400 group-open:text-black dark:group-open:text-white font-bold list-none flex flex-row justify-between items-center transition-colors">
        <h4 class="select-none">Giá</h4>
        <svg class="w-4 h-4 -rotate-90 group-open:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
            </path>
        </svg>
    </summary>
    <ul class="animate-[sweepIn_.2s_ease-in-out] p-2">
        <?php foreach ($price_ranges as $price_range) : ?>
            <li class="mb-2 flex flex-row items-center justify-between">
                <input type="radio" name="price_range" id="price_range_<?= $price_range['id'] ?>" value="<?= $price_range['id'] ?>" class="mr-2" <?= $price_range_param === $price_range['id'] ? "checked" : "" ?>>
                <label for="price_range_<?= $price_range['id'] ?>" class="flex flex-row justify-between w-full">
                    <h2 class="font-medium">
                        <?= $price_range['name'] ?>
                    </h2>
                </label>
            </li>
        <?php endforeach; ?>
    </ul>
</details>