<?php 
session_start();
//session_unset();

//$_SESSION["todo"] = []; 
echo "<pre>request :";
print_r($_REQUEST);
echo "</pre>";

echo "<pre>post :";
print_r($_POST);
echo "</pre>";

$is_update = "insert";
$update_item_name = '';
$update_item_id = '';

//insert data
if((isset($_POST["todo_title"]) && $_POST["type"] == "insert") && $_POST["todo_title"] != " ") {
	array_push($_SESSION["todo"], $_POST["todo_title"]);
};

//delete data
if (isset($_POST["delete_id"])) {
	array_splice($_SESSION["todo"],$_POST["delete_id"],1);
}


//update data
if ( ($_POST["type"] == "update" && isset($_POST["todo_title"])) && $_POST["todo_title"] != "") {
	 $_SESSION["todo"][$_POST["update_id"]] = $_POST["todo_title"]; 

}


if ((isset($_POST["update_name"]) && isset($_POST["update_id"])) && $_POST["update_name"] != "") {
	// $_SESSION[$_POST["update_id"]] = $_POST["update_name"]; 
	$is_update = "update";
	$update_item_name = $_POST["update_name"];
	$update_item_id = $_POST["update_id"];
	
}




echo "<pre>";
print_r($_SESSION);
echo "</pre>";
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
		<form action="todo_list.php" method="POST">
			<legend id="todo_legend">Insert Data
			<input type="text" name="todo_title" mode="<?php echo $is_update?>" id="todo_title" placeholder="insert todo.." value="<?php echo $update_item_name?>" autofocus/>

			<input type="hidden" name="type" id="" value="<?php echo $is_update?>">

			<input type="hidden" name="update_id" id="" value="<?php echo $update_item_id ?>">

				<button type="submit">insert</button>
			</form>
		</form>
	</div>
	
	
	
	
	
	
	<div> 
		<div id="result">
			<ul class="ul" >
			<?php foreach ($_SESSION["todo"] as $key=>$items) {?>
				<li class="result_list"> 
					<div class="items"><span class="index" style="margin-right:5px;"><?php echo $key <10 ? "0".$key : $key?></span>
						<span ><?php echo $items?></span>
					</div>
					<div style="display:flex; align-items:center;;">
					
						<form action="todo_list.php" method="POST" style="margin:0px 2px">
							<input type="hidden" name="delete_id" id="delete_id" value='<?php echo $key;?>' />
							<button type="submit">delet</button>
						</form>
						
						<form action="todo_list.php" method="POST" style="margin:0px 2px ">
							<input type="hidden" name="update_name" id="update" value="<?php echo $items?>" />
							<input type="hidden" name="update_id" value="<?php echo $key?>" />
							<button> update </button>
							
							<br>
							
						
						</form>
						
					</div>

				</li>
			<?php }?>
			</ul>
		</div>
	</div>
	
</body>
</html>