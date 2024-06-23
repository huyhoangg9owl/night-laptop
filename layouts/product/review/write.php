<form class="w-full mt-4" action="/services/product/review" method="post">
    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
    <textarea class="hidden" id="review" name="review"></textarea>
    <p class="text-md italic font-semibold text-red-600 dark:text-red-400 mt-4">* Không thể chỉnh sửa đánh giá khi đã đánh giá thành công!</p>
    <div class="w-full flex flex-row items-center justify-between">
        <div class="flex items-center gap-2">
            <div class="flex items-center gap-1">
                <?php
                $stars = [1, 2, 3, 4, 5];
                foreach ($stars as $star) {
                ?>
                    <label for="star-<?= $star ?>" class="cursor-pointer" data-name='star-rate'>
                        <input type="radio" name="star" id="star-<?= $star ?>" value="<?= $star ?>" class="hidden peer" <?= $star === 3 ? "checked" : "" ?> required>
                        <?php
                        $color = $star <= 3 ? 'yellow' : 'gray';
                        Icon("star", "fill-$color-400 peer-checked:fill-yellow-400 peer-invalid:fill-red-400 size-8");
                        ?>
                    </label>
                <?php } ?>
            </div>
        </div>
        <button class="text-center w-48 px-5 py-4 rounded-full bg-indigo-600 flex items-center justify-center font-semibold text-lg text-white shadow-sm transition-all duration-500 hover:bg-indigo-700 hover:shadow-indigo-400" type="submit">
            Đánh giá
        </button>
    </div>
</form>