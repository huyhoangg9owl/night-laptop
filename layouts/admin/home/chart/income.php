<div class="flex flex-col items-start justify-between">
    <h1 class="text-sm font-medium text-emerald-800 dark:text-green-400 text-nowrap">
        Tổng thu nhập
        <p class="text-lg font-bold text-emerald-600 dark:text-green-500">$2K</p>
    </h1>
    <?php
    $data = $ChartIncome['data'];
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
    <canvas class="!w-full" id="chart_income"></canvas>
</div>