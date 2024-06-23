<div class="w-full mt-4">
    <?php
    if (count($reviews) > 0) {
        foreach ($reviews as $review) {
            $user = $Account->getAccount($review['account_id']);
            $user_profile = $Account->getAccountProfile($review['account_id']);
    ?>
            <div class="w-full border-b border-gray-300 dark:border-gray-500 py-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="<?= $user_profile['avatar']; ?>" alt="<?= $user['username']; ?>" class="w-full h-full object-cover">
                    </div>
                    <div class="ml-4">
                        <h5 class="font-semibold text-lg text-gray-900 dark:text-white"><?= $user['username']; ?></h5>
                        <div class="flex items-center mt-1">
                            <div class="flex items-center">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $review['star']) {
                                        Icon("star", "w-4 h-4 text-yellow-500 dark:text-yellow-400");
                                    } else {
                                        Icon("star", "w-4 h-4 text-gray-300 dark:text-gray-600");
                                    }
                                }
                                ?>
                            </div>
                            <span class="ml-2 text-gray-500 dark:text-gray-400">
                                <?php
                                require_once ROOT_PATH . '/utils/TimeDate.php';
                                echo TimeDate($review['created_at']);
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-full text-left mt-3 pl-4 ck">
                    <?= htmlspecialchars_decode($review['review']); ?>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <p class="text-gray-500 dark:text-gray-400">Chưa có đánh giá nào cho sản phẩm này</p>
    <?php
    }
    ?>
</div>