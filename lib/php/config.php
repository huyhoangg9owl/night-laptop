<?php
$alias = require_once 'alias.php';
require_once $alias('@lib/SQL.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "night_laptop";
$conn = new SQL($servername, $username, $password, $dbname);

$GLOBALS['conn'] = $conn;
