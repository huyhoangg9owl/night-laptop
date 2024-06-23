<?php
function Icon($name, $class = "", $width = 24, $height = 24)
{
    if ($name) {
        $icon_path = ROOT_PATH . "/components/icons/{$name}.icon.php";
        if (file_exists($icon_path)) {
            $class;
            $width;
            $height;
            include $icon_path;
        } else {
            include ROOT_PATH . "/components/icons/error.icon.php";
        }
    } else {
        include ROOT_PATH . "/components/icons/error.icon.php";
    }
}
