<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once $_SERVER['DOCUMENT_ROOT'] . "/env.php";

require_once ROOT_PATH . '/utils/SQL.php';

require_once ROOT_PATH . "/components/icons/index.php";

date_default_timezone_set('Asia/Ho_Chi_Minh');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "night_laptop";
$conn = new SQL($servername, $username, $password, $dbname);
