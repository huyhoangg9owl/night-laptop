<?php
$reviews = $Product->getReviews($product['id']);
$five_star = 0;
$four_star = 0;
$three_star = 0;
$two_star = 0;
$one_star = 0;

if (count($reviews) > 0) {
    foreach ($reviews as $review) {
        if ($review['star'] === 5) {
            $five_star++;
        } else if ($review['star'] === 4) {
            $four_star++;
        } else if ($review['star'] === 3) {
            $three_star++;
        } else if ($review['star'] === 2) {
            $two_star++;
        } else if ($review['star'] === 1) {
            $one_star++;
        }
    }
?>
    <div class="mb-8 mt-2">
        <div class="flex items-center">
            <?php
            $avg_star = ($five_star * 5 + $four_star * 4 + $three_star * 3 + $two_star * 2 + $one_star) / count($reviews);
            $avg_star = round($avg_star);

            foreach (range(1, 5) as $i) {
                if ($i <= $avg_star) {
                    Icon("star", "size-6 text-yellow-400");
                } else {
                    Icon("star", "size-6 text-gray-300");
                }
            }
            ?>
            <p class="ms-1 text-sm font-medium">
                <?= $avg_star ?>
            </p>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">/</p>
            <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
        </div>
        <div class="flex flex-row items-center gap-4">
            <p class="mt-2 font-medium"><?= count($reviews) ?> Đánh giá</p>
            <p class="mt-2 font-medium">0 Đã mua</p>
        </div>
        <div class="mt-4 flex items-center">
            <a href="/" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">5 sao</a>
            <div class="mx-4 h-5 w-2/4 rounded bg-white dark:bg-slate-500">
                <div class="h-5 rounded bg-yellow-300" style="width: <?= round($five_star / count($reviews) * 100) ?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($five_star / count($reviews) * 100) ?>%</span>
        </div>
        <div class="mt-4 flex items-center">
            <a href="/" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">4 sao</a>
            <div class="mx-4 h-5 w-2/4 rounded bg-white dark:bg-slate-500">
                <div class="h-5 rounded bg-yellow-300" style="width: <?= round($four_star / count($reviews) * 100) ?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($four_star / count($reviews) * 100) ?>%</span>
        </div>
        <div class="mt-4 flex items-center">
            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">3 sao</a>
            <div class="mx-4 h-5 w-2/4 rounded bg-white dark:bg-slate-500">
                <div class="h-5 rounded bg-yellow-300" style="width: <?= round($three_star / count($reviews) * 100) ?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($three_star / count($reviews) * 100) ?>%</span>
        </div>
        <div class="mt-4 flex items-center">
            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">2 sao</a>
            <div class="mx-4 h-5 w-2/4 rounded bg-white dark:bg-slate-500">
                <div class="h-5 rounded bg-yellow-300" style="width: <?= round($two_star / count($reviews) * 100) ?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($two_star / count($reviews) * 100) ?>%</span>
        </div>
        <div class="mt-4 flex items-center">
            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">1 sao</a>
            <div class="mx-4 h-5 w-2/4 rounded bg-white dark:bg-slate-500">
                <div class="h-5 rounded bg-yellow-300" style="width: <?= round($one_star / count($reviews) * 100) ?>%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400"><?= round($one_star / count($reviews) * 100) ?>%</span>
        </div>
    </div>
<?php
} else {
?>
    <h1 class="my-5">Chưa có đánh giá nào</h1>
<?php
}
?>