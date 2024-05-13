<details class="group cursor-pointer" open>
    <summary
        class="text-gray-400 group-open:text-black dark:group-open:text-white font-bold list-none flex flex-row justify-between items-center transition-colors">
        <h4 class="select-none">Danh mục</h4>
        <svg class="w-4 h-4 -rotate-90 group-open:rotate-90 transition-transform" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
            </path>
        </svg>
    </summary>
    <ul class="animate-[sweepIn_.2s_ease-in-out] p-2">
        <?php
        foreach ($categories as $category) {
            $name = $category['name'];
            $slug = $category['slug'];
            ?>
            <li class="mb-2 flex flex-row items-center justify-between">
                <input type="checkbox" name="category[]" id="<?= $slug ?>" value="<?= $slug ?>" class="mr-2" <?php
                    if (in_array($slug, $category_params)) {
                        echo 'checked';
                    } elseif (empty($category_params)) {
                        echo 'checked';
                    }
                    ?>>
                <label for="<?= $slug ?>" class="flex flex-row justify-between w-full">
                    <h2 class="font-medium">
                        <?= $name ?>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400">20</p>
                </label>
            </li>
        <?php }
        ?>
    </ul>
</details>