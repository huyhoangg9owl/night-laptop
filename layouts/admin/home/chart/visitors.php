<div class="flex flex-col items-start justify-between">
    <h1 class="text-sm font-medium text-violet-800 dark:text-violet-400 text-nowrap">
        Lượt truy cập
        <p class="text-lg font-bold text-violet-600 dark:text-violet-500">$3.5K</p>
    </h1>
    <?php
    $data = $ChartVisitors['data'];
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
    <canvas class="!w-full" id="chart_visitors"></canvas>
</div>