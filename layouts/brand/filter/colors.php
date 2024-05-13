<?php
$colors = [
    [
        'id' => 0,
        'name' => 'Đen',
        'color' => '#000000'
    ],
    [
        'id' => 1,
        'name' => 'Trắng',
        'color' => '#ffffff'
    ],
    [
        'id' => 2,
        'name' => 'Xám',
        'color' => '#808080'
    ],
    [
        'id' => 3,
        'name' => 'Đỏ',
        'color' => '#ff0000'
    ],
    [
        'id' => 4,
        'name' => 'Xanh',
        'color' => '#0000ff'
    ],
    [
        'id' => 5,
        'name' => 'Vàng',
        'color' => '#ffff00'
    ],
    [
        'id' => 6,
        'name' => 'Hồng',
        'color' => '#ff00ff'
    ],
    [
        'id' => 7,
        'name' => 'Cam',
        'color' => '#ffa500'
    ],
    [
        'id' => 8,
        'name' => 'Tím',
        'color' => '#800080'
    ],
    [
        'id' => 9,
        'name' => 'Nâu',
        'color' => '#a52a2a'
    ],
    [
        'id' => 10,
        'name' => 'Xanh lá',
        'color' => '#008000'
    ],
    [
        'id' => 11,
        'name' => 'Xanh dương',
        'color' => '#00ffff'
    ],
    [
        'id' => 12,
        'name' => 'Xanh lam',
        'color' => '#000080'
    ],
    [
        'id' => 13,
        'name' => 'Xanh lục',
        'color' => '#008080'
    ],
    [
        'id' => 14,
        'name' => 'Xanh da trời',
        'color' => '#4682b4'
    ],
]
    ?>

<details class="group cursor-pointer" open>
    <summary
        class="text-gray-400 group-open:text-black dark:group-open:text-white font-bold list-none flex flex-row justify-between items-center transition-colors">
        <h4 class="select-none">Màu sắc</h4>
        <svg class="w-4 h-4 -rotate-90 group-open:rotate-90 transition-transform" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
            </path>
        </svg>
    </summary>
    <ul class="animate-[sweepIn_.2s_ease-in-out] p-2">
        <?php foreach ($colors as $color): ?>
            <li class="mb-2 flex flex-row items-center justify-between">
                <input type="checkbox" name="color[]" id="color_<?= $color['id'] ?>" value="<?= $color['id'] ?>"
                    class="mr-2" <?php
                    if (in_array($color['id'], $colors_params)) {
                        echo 'checked';
                    } elseif (empty($colors_params)) {
                        echo 'checked';
                    }
                    ?>>
                <label for="color_<?= $color['id'] ?>" class="flex flex-row justify-between w-full">
                    <h2 class="font-medium">
                        <?= $color['name'] ?>
                    </h2>
                    <div class="w-4 h-4 rounded-full bg-[<?= $color['color'] ?>]"></div>
                </label>
            </li>
        <?php endforeach; ?>
    </ul>
</details>