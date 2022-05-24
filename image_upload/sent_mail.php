<?php 

$message_output = "";
$message = $_REQUEST["message"];

if (isset($_REQUEST["message"])) {	
	$to = "aizubair9866@gmail.com";
	$subject = "welcome to my code";
	$from = "aizubair9866@gmail.com";
	$headers = "testforlorem02@gmail.com";
	if (mail("aizubair9866@gmail.com", $subject, $message, "lestforlorem02@gmail.com")) {
		$message_output = "<br> message sent to : ".$to."<br>";
		echo $message_output;
	} else {
		$message_output =  "message not sent ";
		echo $message_output;
	}
} else
	echo "<br> message body can not empty .";
;





?>