<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

error_reporting(E_ALL);


require_once dirname(__FILE__) . "/root_path.php";
require_once ROOT_PATH . '/utils/SQL.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "night_laptop";
$conn = new SQL($servername, $username, $password, $dbname);

global $conn;
