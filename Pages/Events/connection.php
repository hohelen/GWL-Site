<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "userdb";
$connection = new mysqli($db_server, $db_user, $db_pass, $db_name);
$select_db = mysqli_select_db($connection, $db_name);
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}
?>