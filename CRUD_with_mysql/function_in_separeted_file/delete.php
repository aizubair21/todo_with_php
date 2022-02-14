<?php 


$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "crud";

$conn = mysqli_connect($hostname,$username,'',$db_name);
if ($conn) {
	echo "database connected ! <br>";
}else {
	die(mysqli_connect_error());
};

//delete data
if (isset($_POST['delete_id']) && $_POST['type'] == "delete") {
	$delete = "DELETE FROM crud_test WHERE id = '$_POST[delete_id]'";
	if ($conn->query($delete) === TRUE) {
		echo "Deleted successfully";
		header('Location: index.php');
	  } else {
		echo "Error: ". $conn->error;
	  }
};

