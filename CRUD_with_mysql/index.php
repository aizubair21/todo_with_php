
<?php 
//session_start();
//session_unset();
//database connection_aborted

$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "crud_test";

$conn = mysqli_connect($hostname,$username,'',$db_name ?? '');
if ($conn) {
	
}else {
	?>
	<script>
		alert("Crate mysqli database first. and careate tabele name 'crud_test'. A fild name must 'todo'. ");
	</script>
	<?php
	//die(mysqli_connect_error());
};




	//print_r($_SESSION);
	if (isset($conn)) {
		$sql_data = "SELECT * FROM crud_test";
		if (mysqli_query($conn, $sql_data)) {
			$result = mysqli_query($conn, $sql_data);
			while ($row = mysqli_fetch_array($result)) {
				$row['todo'];
			};
		}else {
			$tabel = "CREATE TABLE curd_test (
				id int AUTO_INCREMENT,
				todo varchar(255),
			)";
			if (mysqli_query($conn, $tabel)) {
				?>
					<script>
						alert('Successfully Table Created');
					</script>
				<?php
			}
		}
		
	}

// echo "<pre> From Server  : <br>";
// 	//print_r( "SELECT * FROM 'crud_test' WHERE id = 1");
// echo "</pre>";

// echo "<pre>request :";
// 	print_r($_REQUEST);
// echo "</pre>";

// echo "<pre>post :";
// 	print_r($_POST);
// echo "</pre>";


// frequent variable

$cond = "";
$is_update = "insert";
$update_item_name = "";
$update_item_id = '';

// $post_array = array('todo_title' => "my name", 'date' => date("d" ."/". "M" ."/". "Y"));
// array_push($main, $post_array);
// print_r($main[0]["todo_title"]);



// update todo
if ( (isset($_POST["type"]) == "insert" && $_POST["updated_id"] != "") && isset($_POST["todo_title"])) {
	// $_SESSION[$_POST["update_id"]] = $_POST["update_name"]; 
	//$is_update = "update";
    //$update_item_name = $_POST["update_name"];
	//$update_item_id = $_POST["update_id"];
	$update = "UPDATE crud_test SET todo = '$_POST[todo_title]' WHERE id = '$_POST[updated_id]'";
	$cond = "Insert Mode";
	if ($conn->query($update) === TRUE) {
		echo "Update Success";
	} else {
		echo "Error: " . $conn->error;
	}
	
};



//insert data
if(isset($_POST["type"]) == "insert" && isset($_POST["todo_title"]) && $_POST["updated_id"] == "") {
	if ($conn) {
		//$_SESSION["todo"] = [];9
		//array_push($_SESSION["todo"], $_POST["todo_title"]);

		$insrt = "INSERT INTO crud_test (todo) VALUES ('$_POST[todo_title]')";
		if ($conn->query($insrt) === TRUE) {
		  echo "New record created successfully";
		} else {
			?>
				<script>
					alert('Table not fount. Crete a table name "curd_test"');
				</script>
			<?php
		  	echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}else{
		
		//array_push($_SESSION["todo"], $_POST["todo_title"]);
	}
};


// change Mode direction
if (isset($_POST['type']) == "update" && (isset($_POST['update_name']) && isset($_POST['update_id']))) {
  echo "Update Mode !";
  $cond = "Update Mode";
};



//delete data
if (isset($_POST['delete_id']) && $_POST['type'] == "delete") {
	$delete = "DELETE FROM crud_test WHERE id = '$_POST[delete_id]'";
	if ($conn->query($delete) === TRUE) {
		echo "Deleted successfully";
	  } else {
		echo "Error: ". $conn->error;
	  }
};













	



?>




<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title> todo management with php </title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<h3 class="title">This is todo management </h3>

	<div class="input_todo">
		<form action="index.php" method="POST" name="insert_form">
			<legend id="todo_legend"> <?php echo $cond ? $cond : "Insert Mode" ?></legend>
			<input type="text" name="todo_title" id="todo_title" placeholder="insert todo" value="<?php 
			if ((isset($_POST['update_name']) && $_POST['update_name'] != "") && $_REQUEST['type'] == 'update') {
				echo (isset($_POST['update_name']) ? $_POST['update_name'] : "");
			};?>">

			<input type="hidden" name="type" id="" value="<?php echo $is_update?>">
			<input type="hidden" name="updated_name" value="<?php echo isset($_POST["update_name"]) ?  $_POST['update_name'] : ""?>">
			<input type="hidden" name="updated_id" id="" value="<?php echo isset($_POST['update_id']) ?  $_POST['update_id'] : "" ?>">

			<button type="submit">insert</button>
			</form>
		</form>
	</div>
	
	
	
	
	
	
	<div> 
		<div id="result">
			<ul class="ul" >
			<?php
			if (isset($conn)) {
				$sql_data = "SELECT * FROM crud_test";
				$result = mysqli_query($conn, $sql_data);
				while ($row = mysqli_fetch_array($result)) {?>

				<li class="result_list"> 
					<div class="items">
						<span class="index" style="margin-right:5px;"> <?php echo $row['id'] < 10 ? "0".$row['id'] : $row['id']?></span>
						<span > <?php print_r($row['todo'])?> </span>
					</div>
					<div style="display:flex; align-items:center;;">
					
						<form action="index.php" method="POST" style="margin:0px 2px">
							<input type="hidden" name="delete_id" id="delete_id" value='<?php echo $row['id'];?>' />
							<input type="hidden" name="type" value="delete">
							<button type="submit">delet</button>
						</form>
						
						<form action="index.php" method="POST" style="margin:0px 2px ">
							<input type="hidden" name="update_name" id="update" value="<?php echo $row['todo']?>" />
							<input type="hidden" name="update_id" value="<?php echo $row['id']?>" />
							<input type="hidden" name="type" value="update">
							<button> update </button>
							
							<br>
							
						
						</form>
						
					</div>

				</li>
				
			<?php }}?>

			</ul>
		</div>
	</div>
	
</body>
</html>