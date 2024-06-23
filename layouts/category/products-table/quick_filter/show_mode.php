<label class="select-none text-sm text-gray-500 bg-white dark:bg-black/40 border-2 rounded px-4 py-2 border-solid border-[#caced1] dark:border-black/20" for="show_mode">Hiện
    <select id="show_mode" name="show_mode" class="bg-transparent text-gray-700 dark:text-white/80 cursor-pointer" onchange='if(this.value) { this.form.submit(); }'>
        <?php foreach ($show_mode_options as $key => $value) : ?>
            <option value="<?= $value ?>" <?php if ($show_mode === $value) echo "selected" ?>>
                <?= $value ?>
            </option>
        <?php endforeach; ?>
    </select>
</label>