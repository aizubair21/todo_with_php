<?php 

//session_start();
//session_unset();
//database connection_aborted

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




// change Mode direction
if (isset($_POST['type']) == "update" && (isset($_POST['update_name']) && isset($_POST['update_id']))) {
  echo "Update Mode !";
  $cond = "Update Mode";
};














	//print_r($_SESSION);
if (isset($conn)) {
	$sql_data = "SELECT * FROM crud_test";
	$result = mysqli_query($conn, $sql_data);
	while ($row = mysqli_fetch_array($result)) {
		$row['todo'];
	};
}
	



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
		<form action="update.php" method="POST" name="insert_form">
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
					
						<form action="delete.php" name="delete_form" method="POST" style="margin:0px 2px">
							<input type="hidden" name="delete_id" id="delete_id" value='<?php echo $row['id'];?>' />
							<input type="hidden" name="type" value="delete">
							<button type="button" onclick="delete_ajax(delete_form.delete_id.value)">delete</button>
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
	<?php

	echo '
	
					<script>
						function delete_ajax (delete_id) {
							function loadDoc() {
								var xmlhttp = new XMLHttpRequest();
								xmlhttp.onreadystatechange = function() {
								  if (this.readyState == 4 && this.status == 200) {
									alert(this.responseText);
								  }
								};
								xmlhttp.open("GET","delete.php?delete_id="+delete_id,true);
								xmlhttp.send();
							};

							alert(delete_id);
						}

					</script>
	
	';
	?>
</body>
</html>