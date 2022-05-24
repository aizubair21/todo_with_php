<?php 


include "connection.php";


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
		header('Location: index.php');
	  } else {
		echo "Error: ". $conn->error;
	  }