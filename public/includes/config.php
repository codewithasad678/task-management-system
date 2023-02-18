<?php
include('mysql.php');
//error_reporting(0);
//ini_set("display_errors", "on");
$hostname = "localhost";
$db_name = "islikes";
$username = "root";
$password = '';

$conn=mysqli_connect($hostname, $username, $password, $db_name);

mysql_connect($hostname, $username, $password) or die(mysql_error());

mysql_select_db($db_name) or die(mysql_error());

if (!isset($_SESSION)) {
	session_start();
}
