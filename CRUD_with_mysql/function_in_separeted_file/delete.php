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


echo "<pre>";
print_r($_POST);
echo "</pre>";

echo $_POST["delete_id"];
//delete data
if (isset($_POST['delete_id'])) {
	
};
$delete = "DELETE FROM crud_test WHERE id = '$_REQUEST[delete_id]'";
	if ($conn->query($delete) === TRUE) {
		echo "Deleted successfully";
		//header('Location: index.php');
	  } else {
		echo "Error: ". $conn->error;
	  }