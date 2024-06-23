<div class="flex flex-col items-start justify-between">
    <h1 class="text-sm font-medium text-amber-800 dark:text-orange-400 text-nowrap">
        Số sản phẩm
        <p class="text-lg font-bold text-amber-600 dark:text-orange-400">426</p>
    </h1>
    <?php
    $data = $ChartProducts['data'];
    $percent = ($data[count($data) - 1] - $data[0]) / $data[0] * 100;
    $percent = round($percent);
    ?>
    <h3 class="font-bold text-base italic <?= PercentColor($percent) ?>">
        <?php
        echo $percent > 0 ? "+$percent%" : "$percent%";
        ?>
    </h3>
</div>
<div class="w-full relative">
    <canvas class="!w-full" id="chart_products"></canvas>
</div>