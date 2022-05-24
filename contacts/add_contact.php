<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
   content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
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
<form action="user.php" style="width: 70%; margin: 50px auto;" >
<fieldset >
  <legend>Data submitted to surver: </legend>
  <div style=" width:50%; margin: 0 auto;">

     <input type="text" name="first_name" id="first_name" placeholder="Your full Name: " autofocus> <br>
      <input type="number" name="number" id="last_name" placeholder=" 01798-667580" maxlength="11" pattern="{0-9{[5]-{0-9}[6]"> <br>
      <input type="email" name="u_email" id="u_email" placeholder="Your email: " autocomplete="on"> <br>
  
    <input type="submit" value="Go">
  </div>
</fieldset>
</form>
</body>
</html>