<?php
$class = $class ?? "";
$child = $child ?? "";
?>

<label class="toggle-btn <?= $class ?>" for="theme-toggle">
    <input type="checkbox" name="theme-toggle" class="sr-only" id="theme-toggle" />
    <?php
    Icon("sun", "dark:hidden fill-yellow-400", 16, 16);
    Icon("moon", "hidden dark:block fill-purple-600", 16, 16);
    echo $child;
    ?>
</label>