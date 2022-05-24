
<?php
include ("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> contact </title>
</head>
<body>
<div class="">
  <button style="background-color: blue; padding:5px 10px; border:none"> <a href="add_contact.php" style="color: white; font-size:15px;
  text-decoration:none;">Add contact</a> </button>
</div>
<table >

<style>
  th, td {
    padding: 5px 15px;
  }
</style>

  <thead>
    <tr >
      <th style="border: 1px solid black; ">Id</th>
      <th style="border: 1px solid black; ">Nmae</th>
      <th style="border: 1px solid black; ">Phone</th>
      <th style="border: 1px solid black; ">E-manil</th>
      <th style="border: 1px solid black; ">Action</th>
    </tr>
  </thead>
  <tbody>
    
   <?php


   $get_data = "SELECT * FROM user_info";
   $result = mysqli_query($conn_to_db,$get_data);

   while ($row = mysqli_fetch_assoc($result)) {
    echo '
    <tr>
      <td>' .$row["id"]. '</td>
      <td>' .$row["name"]. '</td>
      <td>' .$row["phone"]. '</td>
      <td>' .$row["email"]. '</td>
      <td>
      <button style="backgound-color:blue; color:black; padding:5px 10px" > <a href="update.php?updatId='.$row["id"].'" method="GET" style="text-decoration:none"> Update </a> </button>
      <button style="backgound-color:blue; color:black; padding:5px 10px" > <a href="delet.php?deletId='.$row["id"].'" method="GET" style="text-decoration:none"> Delet </a> </button>
      </td>
    </tr>';
  }


   ?>
  </tbody>
</table>
</body>
</html>