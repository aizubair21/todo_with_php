<?php 
	session_start();

	echo $_REQUEST["name"]; 
	echo "<br>";
	echo $_REQUEST["type"];
	echo "<br>";
	echo $_REQUEST["delete_id"];
	echo "<pre><br>";
	print_r ($_REQUEST);
	echo "<pre>";


	if(isset($_REQUEST["name"]) && $_REQUEST["type"] == "insert" && $_REQUEST["name"] != "" && $_REQUEST["delete_id"] = "") {
		if (!$_SESSION["todo"]) {
			$_SESSION["todo"] = [];
			array_push($_SESSION["todo"], $_REQUEST["name"]);
		}else{
			
			array_push($_SESSION["todo"], $_REQUEST["name"]);
		}
	};

	//delete todo
	if (isset($_REQUEST["delete_id"]) && $_REQUEST["type"]) {
		array_splice($_SESSION["todo"],intval($_REQUEST["delete_id"],1));
	}

?>;