<?php
if ($name_icon) {
	$icon_path = "components/icons/{$name_icon}.icon.php";
	if (file_exists($icon_path)) {
		require $icon_path;
	} else {
		echo "Icon not found";
	}
} else {
	echo "Icon name not found";
}
