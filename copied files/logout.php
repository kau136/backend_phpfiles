<?php
header("access-control-allow-origin:*");
header("access-control-allow-method:POST,GET,OPTIONS");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";

$conn = new mysqli($servername, $username, $password, $dbname);

session_start();
session_unset();
session_destroy();

header('location:login.php');

?>