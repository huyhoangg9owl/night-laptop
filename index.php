<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

error_reporting(E_ALL);

require_once "lib/php/root_path.php";
require_once "lib/php/config.php";
$route = require_once "utils/Router.php";
$route = $route->init();

if (!str_contains($route, "upload")) require_once $route;