<?php

include 'Db.php';
error_reporting(0);

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM USERS WHERE EMAIL_ID = '$email' && PASSWORD = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0)
   {
      $error[] = 'User already exist!';
   }
   else
   {
      if($pass != $cpass)
      {
          $error[] = 'Password not matched!';
      }
      else
      {
         $insert = "INSERT INTO users(USERNAME, EMAIL_ID, PASSWORD, USER_TYPE) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:Login.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Rica - Register form</title>
   <link rel="icon" href="IMG/logos/Lightning.png" type="image/png">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/Login_and_Register.css">

</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error))
      {
         foreach($error as $error)
         {
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name"  placeholder="Enter your name" maxlength="30"required>
      <input type="email" name="email"  placeholder="Enter your email" maxlength="30" required>
      <input type="password" name="password"  placeholder="Enter your password" maxlength="20" required>
      <input type="password" name="cpassword"  placeholder="Confirm your password" maxlength="30" required>
      <select name="user_type">
         <option value="user">User</option>
         <!-- <option value="admin">Admin</option> -->
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="Login.php">Login now</a></p>
   </form>
</div>

</body>
</html>