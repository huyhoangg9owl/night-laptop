<ul class="mt-8 grid grid-cols-4 justify-center gap-4 w-full max-lg:grid-cols-2">
    <?php
    $mini_charts = [
        "income",
        "products",
        "orders",
        "visitors"
    ];
    foreach ($mini_charts as $chart) {
    ?>
        <li class="select-none grid max-lg:grid-cols-[auto_1fr] gap-2 w-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md hover:-translate-y-2 transition-transform ease-linear">
            <?php
            require_once $chart . ".php";
            ?>
        </li>
    <?php } ?>
</ul>