<?php 

$host_name = "localhost";
$user_name  = "root";
$password = "";
$db_name = "myDb";


//GER usr info from contact form 

$u_name = $_GET["first_name"];
$u_p_number = $_GET["number"];
$u_email = $_GET["u_email"];

// $first_number = $_GET['first_number'];
// $second_nuber = $_GET['second_number'];
// $last_number = $_GET["last_number"];

// $arrar_contain_number = [
//   $first_number,$second_nuber,$last_number
// ];





//connect to server

$conn_to_server = mysqli_connect($host_name, $user_name, $password);
if ($conn_to_server) {
  # code...
  echo "server connected ";
} else { 
  echo "provlem to connect server" .mysqli_connect_error();

};

echo'<br>';


//connect to database 

$conn_to_db = mysqli_connect($host_name,$user_name,$password,$db_name);
if ($conn_to_db) {
  # code...
  echo "Db connected " ;
} else {
  echo "Here an provlem to connect to database" .mysqli_connect_error();
};

echo'<br>';



//send data to server 

$sql_to_send_data = "INSERT INTO user_info(name, phone, email) VALUE('$u_name','$u_p_number', '$u_email')";

if (mysqli_query($conn_to_db, $sql_to_send_data) === true) {
  echo "data insert done";
  echo'<br>';
  $last_id = $conn_to_db->insert_id;
  // echo "Your id is: $last_id";
  header("location:contact.php");

} else { 
  echo "have an error: " .$conn_to_db->error;};
