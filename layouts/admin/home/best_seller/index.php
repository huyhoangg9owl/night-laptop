<div class="grid grid-cols-2 gap-4 mt-8 max-lg:grid-cols-1">
    <?php
    $number_format = require_once ROOT_PATH . "/lib/php/number_format.php";

    $best_seller = [
        [
            'id' => 1,
            'name' => 'Iphone 12 Pro Max',
            'img' => 'https://via.placeholder.com/900x900',
            'price' => 100000,
            'sold' => 1000,
            'profit' => 1000000,
        ],
        [
            'id' => 2,
            'name' => 'Legion 5 Pro',
            'img' => 'https://via.placeholder.com/900x900',
            'price' => 200000,
            'sold' => 200,
            'profit' => 2000000,
        ],
        [
            'id' => 3,
            'name' => 'Macbook Pro 2021',
            'img' => 'https://via.placeholder.com/900x900',
            'price' => 300000,
            'sold' => 300,
            'profit' => 3000000,
        ],
        [
            'id' => 4,
            'name' => 'IPad Pro 2021',
            'img' => 'https://via.placeholder.com/900x900',
            'price' => 400000,
            'sold' => 400,
            'profit' => 4000000,
        ],
        [
            'id' => 5,
            'name' => 'Samsung Galaxy S21 Ultra',
            'img' => 'https://via.placeholder.com/900x900',
            'price' => 500000,
            'sold' => 500,
            'profit' => 5000000,
        ]
    ];

    require_once __DIR__ . '/products.php';
    require_once __DIR__ . '/categories.php';
    ?>
</div>