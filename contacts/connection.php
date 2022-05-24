<?php 

$host_name = "localhost";
$user_name  = "root";
$password = "";
$db_name = "myDb";



$conn_to_server = mysqli_connect($host_name, $user_name, $password);
if ($conn_to_server) {
  # code...
  echo "server connected ";
} else { 
  echo "provlem to connect server" .mysqli_connect_error();

};
echo "<br>";

//connect to database 

$conn_to_db = mysqli_connect($host_name,$user_name,$password,$db_name);
if ($conn_to_db) {
  # code...
  echo "Db connected " ;
} else {
  echo "Here an provlem to connect to database" .mysqli_connect_error();
};

echo'<br>';
