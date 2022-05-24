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

  # code...

$id = $_GET['updatId'];
echo $id ;

$get_user = "SELECT * FROM user_info WHERE id=$id";
$result = mysqli_query($conn_to_db, $get_user);
 




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Add User </title>
  <style>

  input {
    box-sizing: border-box;
  }
  input[type=number] {
    padding: 5px 10px;
    margin: 5px;
    font-size: 15px;
  }

  input[type=text], input[type=email],input[type=phone] {
    padding: 5px 10px;
    margin: 5px;
    font-size: 15px;
  }

  input[type=submit] {
    padding: 5px;
    font-size: 15px;
    margin: 5px;
  }


</style>
</head>
<body>
<form action="final_update.php" method="GET" style="width: 70%; margin: 50px auto;" >
<fieldset >
  <legend>Data submitted to surver: </legend>
  <div style=" width:50%; margin: 0 auto;">
<?php
 while ($row = mysqli_fetch_assoc($result)) {
    $idn = $row["id"];
    $name = $row["name"];
    $phone = $row["phone"];
    $email = $row["email"];}?>
      <input type="number" name="slId" id="slId" value="<?php echo "$idn"?>">

     <input type="text" name="first_name" id="first_name" value="<?php echo "$name"?>" autofocus> <br>

      <input type="number" name="number" id="last_name" value="<?php echo "$phone" ?>" maxlength="11"> <br>

      <input type="email" name="u_email" id="u_email" value="<?php echo "$email"?>" autocomplete="on"> <br>

   <button type="submit" name="update" style="padding: 10px 25px;"> GO  </button>
  </div>
</fieldset>
</form>
</body>
</html>