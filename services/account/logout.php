<?php
setcookie("auth_token", "", time() - 3600, "/");
header("Location: /");