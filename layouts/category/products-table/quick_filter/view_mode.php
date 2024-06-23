<div class="flex flex-row items-center justify-center">
    <?php foreach ($view_mode_options as $key => $value) : ?>
        <label for="view_mode_<?= $value ?>" class="text-gray-<?= $value === $view_mode ? 700 : 400 ?> hover:text-gray-700 dark:text-white<?= $value === $view_mode ? "" : "/70" ?> dark:hover:text-white transition-colors relative">
            <input type="radio" name="view_mode" value="<?= $value ?>" id="view_mode_<?= $value ?>" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 size-6 opacity-0 cursor-pointer" onchange='if(this.value) { this.form.submit(); }' <?= $value === $view_mode ? "checked" : "" ?>>
            <?php Icon($value); ?>
        </label>
    <?php endforeach; ?>
</div>