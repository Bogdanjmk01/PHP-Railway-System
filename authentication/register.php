<?php

@include '../database/config.php';

if(isset($_POST['submit'])) {

   $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
   $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM client WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0) {

      $error[] = 'User already exist!';

   } else {

      if($pass != $cpass) {
         $error[] = 'Passwords do not match!';
      }
      else {
         $insert = "INSERT INTO client(prenume, nume, adresa, numar_telefon,email,parola) VALUES('$firstName','$lastName','$address','$phone','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/authentication.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <style>

    </style>
    <header>
        <div class="content flex_space">
            <div class="logo">
                <img src="images/" alt="">
            </div>
            <div class="navlinks">
                <ul id="menulist">
                    <li><a class="links" href="../index.php">home</a></li>
                    <li><a class="links" href="../about.php">about</a> </li>
                    <li><a class="links" href="../trains.php">trains</a> </li>
                    <li><a class="links" href="login.php">login</a></li>
                </ul>
                <span class="fa fa-bars" onclick="menutoggle()"></span>
            </div>
        </div>
    </header>

    <script>
    var menulist = document.getElementById('menulist');
    menulist.style.maxHeight = "0px";

    function menutoggle() {
        if (menulist.style.maxHeight == "0px") {
            menulist.style.maxHeight = "100vh";
        } else {
            menulist.style.maxHeight = "0px";
        }
    }
    </script>

    <div class="login-box">
        <h2>Register</h2>
        <form method="post">
            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <div class="user-box">
                <input type="text" name="firstName" required="">
                <label>First name</label>
            </div>
            <div class="user-box">
                <input type="text" name="lastName" required="">
                <label>Last name</label>
            </div>
            <div class="user-box">
                <input type="text" name="address" required="">
                <label>Address</label>
            </div>
            <div class="user-box">
                <input type="text" name="phone" required="">
                <label>Phone</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="cpassword" required="">
                <label>Confirm Password</label>
            </div>
            <button type="submit" name="submit" class="register-button">
                Register
            </button>
            <p>Already have an account? Click here to
                <a class="links" style="display:flex; justify-content:center; align-items:center;"
                    href="login.php">Login</a>
            </p>
        </form>
    </div>

</body>

</html>