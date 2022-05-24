
<?php 


$district = ["Bagherhat", "Bandarban", "Barguna", "Bhola", "Bogra", "Brahamanbaria", "Chandpur", "Chittagong", "Chuadanga", "Comilla", "Cox's Bazar","Dhaka", "Dinajpur","Faridpur", "Feni","Gaibandha", "Gazipur", "Gopalgonj","Habiganj", "Jaipurhat", "Jamalpur", "Jessore", "Jhenaidhah","Khagrachari", "Kishorganj", "Khulna", "Kurigram", "Kushtia","Lasdhmpur", "Lalmonirhat","Madaripur", "Magura", "Manikganj", "Meherpur", "Moulvibazar", "Monshiganj", "Mymensingh","Naoga", "Narial", "Narayanganj", "Narsidhi", "Natore", "Nawabganj","Netrokona", "Nilpamari", "Noakhali","Pabna", "Panchagarh", "Parbattya","Chattagram", "Patuakhali", "Pirojpur", "Rajbari", "Rajshahi", "Rangpur", "Satkhira", "Shariatpur", "Sherpur", "Sirajganj", "Sunamganj", "Sylhet", "Tangail", "Thakurgaon"];
$q = $_REQUEST["q"];
$hint = "";
$responseText = "";


if ($q != "") {
echo '<ol type="1">';	
	$q = strtolower($q);
	$len = strlen($q);
	foreach ($district as $districts) {
		$districtss = strtolower($districts);
		if ( stristr($q, substr($districts,0,$len))) {
			if ($hint === "") {
				echo '<li>' . $districts . " " . '</li>';
				//$responseText = $districts;
			}
		}
	}
echo '</ol>';	
}


?>
<!-- 
<form action="gethint.php" method="post">
	<input type="text" name="key" id="key">
	<input type="submit" value="sumbit">
</form> -->