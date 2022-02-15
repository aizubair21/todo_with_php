
<?php

echo "This is your upload reasult <br>";
//print_r ( $_REQUEST);
if (isset($_REQUEST["sender_name"])) {
	echo "sender name is :" .$_REQUEST["sender_name"];
	$upload_image_name = $_FILES["files"]["name"];
	$extentions = end(explode (".", $_FILES["files"]["name"]));
	if (($_FILES["files"]["type"] == "image/gif") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/png") || ($_FILES["files"]["type"] == "image/pjpeg") && $_FILES["files"]["size"] < 2000) {
		if ($_FILES["files"]["error"] > 0) {
			echo "Return code: " . $_FILES["files"]["error"];
		}else {
			echo $_FILES["files"]["name"] ."<br>";
			echo $_FILES["files"]["size"] ."<br>";
			echo $_FILES["files"]["type"] ."<br>"; 
			move_uploaded_file($_FILES["files"]["tmp_name"], "upload/". $_FILES["files"]["name"]) . "<br>";
			echo "file uploded";
			header("location: ../index.php");
			
		}
	}else {
		echo "This type of extention not supported. <br> You can use Jpg, Png, Jpeg, Gig formate to test.";
		
	}
}
//$allowextentions = array("jpg","jpeg","png","gif");

?>
