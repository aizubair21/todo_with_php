<?php 


include 'connection.php';

// update todo
if ( (isset($_POST["type"]) == "insert" && $_POST["updated_id"] != "") && (isset($_POST["todo_title"]) && $_POST["todo_title"] != "")) {
	// $_SESSION[$_POST["update_id"]] = $_POST["update_name"]; 
	//$is_update = "update";
    //$update_item_name = $_POST["update_name"];
	//$update_item_id = $_POST["update_id"];
	$update = "UPDATE crud_test SET todo = '$_POST[todo_title]' WHERE id = '$_POST[updated_id]'";
	$cond = "Insert Mode";
	if ($conn->query($update) === TRUE) {
		echo "Update Success";
        header("location: index.php");
	} else {
		echo "Error: " . $conn->error;
	}
	
};

//insert data
if(isset($_POST["type"]) == "insert" && (isset($_POST["todo_title"]) && $_POST["todo_title"] != "") && $_POST["updated_id"] == "") {
	if ($conn) {
		//$_SESSION["todo"] = [];9
		//array_push($_SESSION["todo"], $_POST["todo_title"]);


		$sql_data = "SELECT * FROM crud_test";
		$result = mysqli_query($conn, $sql_data);
		$row = mysqli_fetch_array($result) ;

			if (in_array($_POST['todo_title'], $row)) {
				echo "matched ";
			}else {
				$insrt = "INSERT INTO crud_test (todo) VALUES ('$_POST[todo_title]')";
				if ($conn->query($insrt) === TRUE) {
				  echo "New record created successfully";
				  header("location: index.php");
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}
			};
	


		
		
	}else{
		
		//array_push($_SESSION["todo"], $_POST["todo_title"]);
	}
};

//header("location: index.php");
