<html>
<head>
</head>

<style>
#fakemail {
	display:none;
}
#live {
	display:none;
}
</style>

<body style="padding: 10px">
<h2 style="margin:0; padding:0">inpge input</h2>
<p style="margin:0">you can upload only image </P>
<form action="upload/upload_file.php" method="post" enctype="multipart/form-data" required>

    <label for="sender_name">Your Name: </label>
	<input type="text" name="sender_name" id="sender_name" placeholder="Your Name .." required>
	<input type="file" name="files" id="files">
    <input type="submit" value="submit">
    
</form>

<label for="fackmakeshow">Show fack mail sender
<input type="checkbox" name="facekmail" id="fackmakeshow" onchange="showFakeMail()">
 </label>

<label for="livesearch"> Show live search
<input type="checkbox" name="liveserarch" id="livesearch" onchange="showLiveSearch()">
 </label>


<div id="fakemail" style="padding:10px">

	<form action="sent_mail.php" method="post" enctype="multipart/form-data" name="send_mail">

	<input type="text" name="my_message" id="message" placeholder="type your message ">
	<input type="button" value="sent" onclick="sendSms('send_mail.my_message.value')"> <br>
	<p id="show_email_result"></p>
	</form>

</div>



<script>







function sendSms (message) {

	if (message === "") {
		document.getElementById("show-email_result").innerHTML = "";
	}else {
		var XHR = new XMLHttpRequest();
		XHR.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('show_email_result').innerHTML = this.responseText;
			};
		};

		XHR.open ('POST', 'sent_mail.php?message='+message, true);
		XHR.send();
	};
	
	
	
	
}
function showFakeMail () {
		if (document.getElementById("fakemail").style.display == "block") {
			document.getElementById("fakemail").style.display = "none";
		}else {
			document.getElementById("fakemail").style.display = "block";
		}

	};
	
function showLiveSearch () {
	if (document.getElementById("live").style.display == "block") {
		document.getElementById("live").style.display = "none";
	}else {
		document.getElementById("live").style.display = "block";
	};

}

</script>
</body>
</html>