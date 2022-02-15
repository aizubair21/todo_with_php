<?php
session_start();
//session_unsett();

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
		<form action="insert_with_ajax.php" method="POST" name="insert_form">
			<legend id="todo_legend">Insert Data
			<input type="text" name="todo_title" mode="<?php echo $is_update?>" id="todo_title" placeholder="insert todo.." value="<?php echo isset($update_item_name)?>" autofocus autocomplete="off"/>

			<input type="hidden" name="type" id="" value="insert">
			
			<input type="hidden" name="update_id" id="" value="<?php echo isset($_POST["update_id"]) ? $_POST["update_id"] : "" ?>">

			<button type="button" onclick="sumbit_data(insert_form.todo_title.value, insert_form.type.value, insert_form.update_id.value)">insert</button>
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
					
						<form action="index.php" method="POST" name="delete_form" style="margin:0px 2px">
							<input type="hidden" name="delete_id" id="delete_id" value='<?php echo $key;?>' />
							<button type="submit" onclick="delete_ajax(delete_form.delete_id.value)">delete</button>
						</form>
						
						<form action="insert_with_ajax.php" method="POST" style="margin:0px 2px ">
							<input type="hidden" name="update_name" id="update" value="<?php echo $items?>" />
							<input type="hidden" name="update_id" value="<?php echo $key?>" />
							<input type="hidden" name="type" value="update">
							<button type="button"> update </button>
							
							<br>
							
						
						</form>
						
					</div>

				</li>
				
			<?php }}?>

			</ul>
		</div>
		<p id="response_text">response text</P>
	</div>
	<script>
		
		function sumbit_data (todo_title, type, update_id) {
			document.getElementById("todo_title").innerHTML = "";
			var XHR = new XMLHttpRequest();
			XHR.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById('response_text').innerHTML = this.responseText;
					};
			};
			XHR.open ('POST', 'insert_with_ajax.php?name='+todo_title+'&type='+type, true);
			XHR.send();
		};
		
	</script>
	
</body>
</html>


<?php

echo "<pre>";
 print_r($_REQUEST);
echo "<br>";
 print_r($_SESSION);
echo "</pre>";

?>