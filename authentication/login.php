<?php

@include '../database/config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM client WHERE email = '$email' && parola = '$pass' ";
   $select2 = "SELECT * FROM angajati_tren where email = '$email' AND parola= '$pass'";

   $result = mysqli_query($conn, $select);
   $result2 = mysqli_query($conn, $select2);

   if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      /*if($row['rol'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }*/

        $_SESSION["id"] = $row['id'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["firstName"] = $row['prenume'];
        $_SESSION["lastName"] = $row['nume'];
        header('location:../user/landing.php');
     
   } else {
      $error[] = 'Incorrect email or password!';
   }

   if(mysqli_num_rows($result2) > 0) {

    $row = mysqli_fetch_array($result2);

      $_SESSION["id"] = $row['id'];
      $_SESSION["email"] = $row['email'];
      $_SESSION["firstName"] = $row['prenume'];
      $_SESSION["lastName"] = $row['nume'];
      $_SESSION["nume_angajat"] = $row['nume_angajat'];
      header('location:../admin/admin.php');
   
 } else {
    $error[] = 'Incorrect email or password!';
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
                    <li><a class="links" href="register.php">register</a></li>
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
        <h2>Login</h2>
        <form method="post">
            <?php
            if(isset($error)){
            foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
            };
            };
            ?>
            <div class="user-box">
                <input type="text" name="email" required="">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <button type="submit" name="submit" class="register-button">
                Login
            </button>
            <p>Don't have an account? Click here to
                <a class="links" style="display:flex; justify-content:center; align-items:center;"
                    href="register.php">Register</a>
            </p>
        </form>
    </div>

</body>

</html>