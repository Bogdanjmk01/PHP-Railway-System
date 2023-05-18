<!DOCTYPE html>
<html lang="en">

<?php

session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body color="color:white;">
    <section class="main">
        <style>
        .main {
            width: 100%;
            height: 930px;
            position: relative;
            background-image: url("images/b1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            color: #fff;
        }
        </style>
        <?php
    if (isset($_SESSION["email"])) {
        
        ?>
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

        <header>
            <div class="content flex_space">
                <div class="logo">
                    <img src="images/" alt="">
                </div>
                <div class="navlinks">
                    <ul id="menulist">
                        <li><a class="links" href="user/landing.php">Home</a> </li>
                        Welcome <?php echo $_SESSION["firstName"] . ' ' . $_SESSION["lastName"]; ?>
                        <li><a class="links" href="authentication/logout.php" tite="Logout">logout</a></li>
                        <li><a class="links" href="trains.php">trains</a> </li>
                    </ul>
                    <span class="fa fa-bars" onclick="menutoggle()"></span>
                </div>
            </div>
        </header>
        <?php
    } else {
        ?>
        <header>
            <div class="content flex_space">
                <div class="logo">
                    <img src="images/" alt="">
                </div>
                <div class="navlinks">
                    <ul id="menulist">
                        <li><a class="links" href="user/landing.php">home</a> </li>
                        <li><a class="links" href="trains.php">trains</a> </li>
                        <li><a class="links" href="authentication/login.php" tite="Logout">login</a></li>
                        <li><a class="links" href="authentication/register.php">register</a> </li>
                    </ul>
                    <span class="fa fa-bars" onclick="menutoggle()"></span>
                </div>
            </div>
        </header>
        <?php
    } 
      ?>

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


        <div class="main-part">
            <h1>About Us</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita alias commodi molestias laboriosam vel
                neque dolore vitae facere animi. Explicabo est fuga culpa animi eum ullam dicta enim! Fuga, ipsa.</p>
            <a class="main-button" href="index.php">Start Now</a>
        </div>
    </section>

    <section class="about">
        <div class="about-img">
            <img src="images/woman.png" alt="about">
        </div>
        <div class="about-text">
            <h2>Our Care for Customers</h2>
            <p>Something about the website</p>
        </div>
    </section>

    <section class="about">
        <div class="about-img">
            <img src="images/woman.png" style="transform: scaleX(-1);" alt="about">
        </div>
        <div class="about-text">
            <h2>Our development throughout the years!</h2>
            <p>Something about the website</p>
        </div>
    </section>

    <section class="about">
        <div class="about-img">
            <img src="images/woman2.png" alt="about">
        </div>
        <div class="about-text">
            <h2>Our mission as an organization</h2>
            <p>Something about the website</p>
        </div>
    </section>

    <section class="about">
        <div class="about-img">
            <img src="images/about.jpeg" alt="about">
        </div>
        <div class="about-text">
            <h2>Our Care for Customers</h2>
            <p>Something about the website</p>
        </div>
    </section>

    <section class="ending">
        <div>
            <p class="a">Copyright © 2023 BogdanJMK All Rights Reserved.</p>
        </div>
    </section>

</body>

</html>