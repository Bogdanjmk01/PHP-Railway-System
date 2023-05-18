<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BogdanJMK</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-LkcbQz41wgjRdMwya31y5xPhItD+9iMcSC8DhWZtOdwPCVlaERrJeCBbf7rQWsttIgh7VxODkNvI4sbl4eUC/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    if ($_SESSION["email"]) {
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
                    <li><a class="links" href="../about.php">about</a> </li>
                    Welcome <?php echo $_SESSION["firstName"] . ' ' . $_SESSION["lastName"]; ?>
                    <li><a class="links" href="../authentication/logout.php" tite="Logout">logout</a></li>
                    <li><a class="links" href="../trains.php">trains</a> </li>
                </ul>
                <span class="fa fa-bars" onclick="menutoggle()"></span>
            </div>
        </div>
    </header>
    <?php
    } else
        echo "<h1>Please login first .</h1>";
    ?>
    <section class="home">
        <div class="content">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="../images/metro.jpg" alt="">
                    <div class="text">
                        <h1>Spend Your Holiday</h1>
                        <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                        </p>
                        <div class="flex">
                            <a href="../about.php"><button class="primary-btn">READ MORE</button></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="../images/metro-city.jpg" alt="">
                    <div class="text">
                        <h1>Spend Your Holiday</h1>
                        <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                        </p>
                        <div class="flex">
                            <a href="../about.php"><button class="primary-btn">READ MORE</button></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="../images/women-metro.jpg" alt="">
                    <div class="text">
                        <h1>Spend Your Holiday</h1>
                        <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                        </p>
                        <div class="flex">
                            <a href="../about.php"><button class="primary-btn">READ MORE</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
        integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    </script>

    <section class="book">
        <div class="container flex_space">
            <div class="text">
                <h1> <span>Book </span> Your Seats </h1>
            </div>
            <div class="form">
                <form class="grid">
                    <input type="date" placeholder="Araival Date">
                    <input type="date" placeholder="Departure Date">
                    <input type="number" placeholder="Adults">
                    <input type="number" placeholder="Childern">
                    <button class="secondary-btn" type="button"
                        onclick="window.location.href='ticket-availability.php'">Check Availability</button>
                </form>
            </div>
        </div>
    </section>

    <section class="trains">
        <div class="container top">
            <div class="heading">
                <h1>EXPOLRE</h1>
                <h2>Our Trains</h2>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                </p>
            </div>

            <div class="content mtop">
                <div class="owl-carousel owl-carousel1 owl-theme">
                    <div class="items">
                        <div class="image">
                            <img src="../images/train-1.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Suporior Trains</h2>
                            <div class="rate flex">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                            <div class="button flex">
                                <button class="primary-btn" onclick="window.location.href='rezervation.php'">BOOK
                                    NOW</button>
                                <h3>$10 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="../images/train2.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Suporior Trains</h2>
                            <div class="rate flex">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                            <div class="button flex">
                                <button class="primary-btn" onclick="window.location.href='rezervation.php'">BOOK
                                    NOW</button>
                                <h3>$35 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="../images/train3.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Suporior Trains</h2>
                            <div class="rate flex">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                            <div class="button flex">
                                <button class="primary-btn" onclick="window.location.href='rezervation.php'">BOOK
                                    NOW</button>
                                <h3>$40 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="../images/train4.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Suporior Trains</h2>
                            <div class="rate flex">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                            <div class="button flex">
                                <button class="primary-btn" onclick="window.location.href='rezervation.php'">BOOK
                                    NOW</button>
                                <h3>$10 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="../images/train5.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Suporior Trains</h2>
                            <div class="rate flex">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                            <div class="button flex">
                                <button class="primary-btn" onclick="window.location.href='rezervation.php'">BOOK
                                    NOW</button>
                                <h3>$15 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="../images/train6.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Suporior Trains</h2>
                            <div class="rate flex">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                            <div class="button flex">
                                <button class="primary-btn" onclick="window.location.href='rezervation.php'">BOOK
                                    NOW</button>
                                <h3>$20 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="../images/train7.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Suporior Trains</h2>
                            <div class="rate flex">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                            <div class="button flex">
                                <button class="primary-btn" onclick="window.location.href='rezervation.php'">BOOK
                                    NOW</button>
                                <h3>$30 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $('.owl-carousel1').owlCarousel({
        loop: true,
        margin: 40,
        nav: true,
        dots: false,
        navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2,
                margin: 10,
            },
            1000: {
                items: 3
            }
        }
    })
    </script>

    <section class="services top">
        <div class="container">
            <div class="heading">
                <h1 id="service">SERVICES</h1>
                <h2>Our Services</h2>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            </div>


            <div class="content flex_space">
                <div class="left grid2">
                    <div class="box">
                        <div class="text">
                            <i class="fa-solid fa-champagne-glasses"></i>
                            <h3>Delious Food</h3>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <i class="fa-solid fa-train-subway"></i>
                            <h3>Best Trains</h3>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <i class="fas fa-users"></i>
                            <h3>Always Safe</h3>
                        </div>
                    </div>
                    <div class="box">
                        <div class="text">
                            <i class="fa-solid fa-ranking-star"></i>
                            <h3>Rated 5 Stars</h3>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <img src="../images/service.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="Customer top">
        <div class="container">
            <div class="owl-carousel owl-carousel2 owl-theme">
                <div class="item">
                    <i class="fa-solid fa-quote-right"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.</p>
                    <h3>Julia Robertson</h3>
                    <label>Julia Robertson</label>
                </div>
                <div class="item">
                    <i class="fa-solid fa-quote-right"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.</p>
                    <h3>Julia Robertson</h3>
                    <label>Julia Robertson</label>
                </div>
                <div class="item">
                    <i class="fa-solid fa-quote-right"></i>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.</p>
                    <h3>Julia Robertson</h3>
                    <label>Julia Robertson</label>
                </div>
            </div>
        </div>
    </section>
    <script>
    $('.owl-carousel2').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1,
            },
            1000: {
                items: 1
            }
        }
    })
    </script>

    <section class="news top trains">
        <div class="container">
            <div class="heading">
                <h1>NEWS</h1>
                <h2>Our News</h2>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            </div>


            <div class="content flex">
                <div class="left grid2">
                    <div class="items">
                        <div class="image">
                            <img src="../images/train-stuff.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Finibus bonorum malorm.</h2>
                            <div class="admin flex">
                                <i class="fa fa-user"></i>
                                <label>Admin</label>
                                <i class="fa fa-heart"></i>
                                <label>500</label>
                                <i class="fa fa-comments"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="../images/metro-2.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2>Finibus bonorum malorm.</h2>
                            <div class="admin flex">
                                <i class="fa fa-user"></i>
                                <label>Admin</label>
                                <i class="fa fa-heart"></i>
                                <label>500</label>
                                <i class="fa fa-comments"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

                <div class="right">
                    <div class="box flex">
                        <div class="img">
                            <img src="../images/forest.jpg" alt="">
                        </div>
                        <div class=" stext">
                            <h2>Etiam Vel Nequ</h2>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                        </div>
                    </div>
                    <div class="box flex">
                        <div class="img">
                            <img src="../images/metro-3.jpg" alt="">
                        </div>
                        <div class="stext">
                            <h2>Etiam Vel Nequ</h2>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                        </div>
                    </div>
                    <div class="box flex">
                        <div class="img">
                            <img src="../images/metro-4.jpg" alt="">
                        </div>
                        <div class="stext">
                            <h2>Etiam Vel Nequ</h2>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="legal">
        <p class="container">Copyright © 2023 BogdanJMK All Rights Reserved.</p>
    </div>

    <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>
</body>

</html>