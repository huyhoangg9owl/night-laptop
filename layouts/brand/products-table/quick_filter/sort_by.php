<label
    class="select-none text-sm text-gray-500 bg-white dark:bg-black/40 border-2 rounded px-4 py-2 border-solid border-[#caced1] dark:border-black/20"
    for="sort_by">Sort by
    <select id="sort_by" name="sort_by" class="bg-transparent text-gray-700 dark:text-white/80 cursor-pointer"
        onchange='if(this.value) { this.form.submit(); }'>
        <?php foreach ($sort_by_options as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($sort_by === $key)
                  echo "selected" ?>>
                <?= $value ?>
            </option>
        <?php endforeach; ?>
    </select>
</label>