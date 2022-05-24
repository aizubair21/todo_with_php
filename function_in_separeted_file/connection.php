<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "crud_test";

$conn = mysqli_connect($hostname,$username,'',$db_name);
if ($conn) {
	echo "database connected ! <br>";
}else {
	die(mysqli_connect_error());
};
