<input type="checkbox" name="theme-toggle" class="sr-only" id="theme-toggle"/>
<label class="toggle-btn" for="theme-toggle">
    <?php
    $class_icon = "dark:hidden fill-yellow-400";
    $name_icon = "sun";
    require ROOT_PATH . "/components/icons/index.php";
    ?>
    <?php
    $class_icon = "dark:block fill-purple-600";
    $name_icon = "moon";
    require ROOT_PATH . "/components/icons/index.php";
    ?>
</label>