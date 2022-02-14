<?php 
$dlt_id = isset($_POST['delete_id']);
if (isset($_POST["delete_id"])) {
	//array_splice($_SESSION["todo"],$_POST["delete_id"],1);
	// sql to delete a record
	$delt = "DELETE FROM crud_test WHERE crud_test.id = $dlt_id";

}
