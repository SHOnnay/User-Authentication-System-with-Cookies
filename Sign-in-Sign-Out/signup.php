<?php
//
if (session_status() >= 0){
      session_start();
      if(isset($_SESSION["uname"])) {
            header("refresh: 0.5; url = private.php");
      }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>Sign Up</title>
</head>
<body>
      <h2>Registration</h2>
      <form action="process.php" method="post">

       Email<input type="text" name="Email"><br>   
       Password<input type="password" name="Password"><br>  
       Confirm <input type="password" name="Confirm_Password"><br>  
      <input type="submit" name="submit"><br>
      </form>
</body>
</html>