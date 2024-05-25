<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/env.php";

require_once ROOT_PATH . '/utils/SQL.php';

require_once ROOT_PATH . "/components/icons/index.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "night_laptop";
$conn = new SQL($servername, $username, $password, $dbname);
