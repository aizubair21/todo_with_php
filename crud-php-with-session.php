<?php 

session_start();
//session_unset();

$result = "";
$is_update = "insert";
$update_item_name = "";
$update_item_id = '';

// $main = array ();

echo "<pre>Session. This array comes from php session variabel : ";
	print_r($_SESSION);

echo "</pre>";


// $post_array = array('todo_title' => "my name", 'date' => date("d" ."/". "M" ."/". "Y"));
// array_push($main, $post_array);
// print_r($main[0]["todo_title"]);

//insert data

if((isset($_POST["todo_title"]) && $_POST["type"] == "insert") && $_POST["todo_title"] != "") {
	if (!$_SESSION["todo"]) {
		$_SESSION["todo"] = [];
		array_push($_SESSION["todo"], $_POST["todo_title"]);
	}else{
		if (in_array( $_POST["todo_title"], $_SESSION["todo"])) {
			$result = "already in array. Try another todo.";
		} else {
			array_push($_SESSION["todo"], $_POST["todo_title"]);
			$result = "Insert done";
		}
		
	};
	
	
};	

//delete data
if (isset($_POST["delete_id"])) {
	array_splice($_SESSION["todo"],$_POST["delete_id"],1);
	$result = "Deleted todo.";
}


//update data
if ( (isset($_POST["type"]) && $_POST["type"] == "update" && isset($_POST["todo_title"])) && $_POST["todo_title"] != "") {
	 $_SESSION["todo"][$_POST["update_id"]] = $_POST["todo_title"]; 
	$result = "Todo Updated.";
}


if ((isset($_POST["update_name"]) && isset($_POST["update_id"])) && $_POST["update_name"] != "") {
	// $_SESSION[$_POST["update_id"]] = $_POST["update_name"]; 
	$is_update = "update";
    $update_item_name = $_POST["update_name"];
	$update_item_id = $_POST["update_id"];
	
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
	<p id="result"> <?php echo $result;?> </p>
	<div class="input_todo">
		<form action="crud-php-with-session.php" method="POST">
			<legend id="todo_legend">Insert Data
			<input type="text" name="todo_title" mode="<?php echo $is_update?>" id="todo_title" placeholder="insert todo.." value="<?php if (isset($update_item_name)){echo $update_item_name;}?>" autofocus/>

			<input type="hidden" name="type" id="" value="<?php echo $is_update?>">
			
			<input type="hidden" name="update_id" id="" value="<?php echo $update_item_id ?>">

			<button type="submit">insert</button>
			</form>
		</form>
	</div>
	
	
	
	
	
	
	<div> 
		<div id="result">
			<ul class="ul" >
			<?php
			if (isset($_SESSION["todo"])) {
				foreach ($_SESSION["todo"] as $key=>$items) {?>
				<div class="data" style="background-color:powderblue;padding:5px;">
					data
				</div>
				<li class="result_list"> 
					<div class="items"><span class="index" style="margin-right:5px;"><?php echo $key <10 ? "0".$key : $key?></span>
						<span ><?php echo $items?></span>
					</div>
					<div style="display:flex; align-items:center;;">
					
						<form action="crud-php-with-session.php" method="POST" style="margin:0px 2px">
							<input type="hidden" name="delete_id" id="delete_id" value='<?php echo $key;?>' />
							<button type="submit">delet</button>
						</form>
						
						<form action="crud-php-with-session.php" method="POST" style="margin:0px 2px ">
							<input type="hidden" name="update_name" id="update" value="<?php echo $items?>" />
							<input type="hidden" name="update_id" value="<?php echo $key?>" />
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


<?php

echo "<pre>request :";
print_r($_REQUEST);
echo "</pre>";

echo "<pre>post :";
print_r($_POST);
echo "</pre>";

