<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proiect PAW</title>
    <link rel="stylesheet" href="./css/style.css">
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

    <header>
        <div class="content flex_space">
            <div class="logo">
                <img src="images/" alt="">
            </div>
            <div class="navlinks">
                <ul id="menulist">
                    <li><a class="links" href="about.php">about</a> </li>
                    <li><a class="links" href="trains.php">trains</a> </li>
                    <li><a class="links" href="authentication/login.php">login</a></li>
                    <li><a class="links" href="authentication/register.php">register</a></li>
                    <li> <button class="primary-btn">BOOK NOW</button> </li>
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

    <section class="home">
        <div class="content">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="images/metro.jpg" alt="">
                    <div class="text">
                        <h1>Spend Your Holiday</h1>
                        <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                        </p>
                        <div class="flex">
                            <a href="about.php"><button class="primary-btn">READ MORE</button></a>
                            <button class="secondary-btn"><a class="links" href="#contact">CONTACT
                                    US</a></button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="images/metro-city.jpg" alt="">
                    <div class="text">
                        <h1>Spend Your Holiday</h1>
                        <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                        </p>
                        <div class="flex">
                            <a href="about.php"><button class="primary-btn">READ MORE</button></a>
                            <button class="secondary-btn"><a class="links" href="#contact">CONTACT
                                    US</a></button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="images/women-metro.jpg" alt="">
                    <div class="text">
                        <h1>Spend Your Holiday</h1>
                        <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                        </p>
                        <div class="flex">
                            <a href="about.php"><button class="primary-btn">READ MORE</button></a>
                            <button class="secondary-btn"><a class="links" href="#contact">CONTACT
                                    US</a></button>
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

    <section class="about top">
        <div class="container flex">
            <div class="left">
                <div class="heading">
                    <h1>WELCOME</h1>
                    <h2>BogdanJMK</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum.</p>
                <a href="about.php"><button class="primary-btn">ABOUT US</button></a>
            </div>
            <div class="right">
                <img src="images/about.jpeg" alt="">
            </div>
        </div>
    </section>

    <section class="counter top">
        <div class="container grid">
            <div class="box">
                <h1>5000</h1>
                <hr>
                <span>Customer</span>
            </div>
            <div class="box">
                <h1>3750</h1>
                <hr>
                <span>Happy Customers</span>
            </div>
            <div class="box">
                <h1>250</h1>
                <hr>
                <span>Expert Technicians</span>
            </div>
            <div class="box">
                <h1>500</h1>
                <hr>
                <span>Trains</span>
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
                            <img src="images/train-1.jpg" alt="">
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
                                <button class="primary-btn">BOOK NOW</button>
                                <h3>$10 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="images/train2.jpg" alt="">
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
                                <button class="primary-btn">BOOK NOW</button>
                                <h3>$35 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="images/train3.jpg" alt="">
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
                                <button class="primary-btn">BOOK NOW</button>
                                <h3>$40 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="images/train4.jpg" alt="">
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
                                <button class="primary-btn">BOOK NOW</button>
                                <h3>$10 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="images/train5.jpg" alt="">
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
                                <button class="primary-btn">BOOK NOW</button>
                                <h3>$15 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="images/train6.jpg" alt="">
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
                                <button class="primary-btn">BOOK NOW</button>
                                <h3>$20 <span> <br> Per Journey </span> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="image">
                            <img src="images/train7.jpg" alt="">
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
                                <button class="primary-btn">BOOK NOW</button>
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

    <section class="gallery">
        <div class="container top">
            <div class="heading">
                <h1>PHOTOS</h1>
                <h2>Our Gallery</h2>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            </div>
        </div>

        <div class="content mtop">
            <div class="owl-carousel owl-carousel1 owl-theme">
                <div class="items">
                    <div class="img">
                        <img src="images/inside-train1.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class="fa fa-plus"> </span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/insidetrain-2.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class="fa fa-plus"> </span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/inside-train3.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class="fa fa-plus"> </span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/insidetrain-4.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class="fa fa-plus"> </span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/insidetrain-5.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class="fa fa-plus"> </span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/inside-train6.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class="fa fa-plus"> </span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
                <div class="items">
                    <div class="img">
                        <img src="images/inside-train7.jpg" alt="">
                    </div>
                    <div class="overlay">
                        <span class="fa fa-plus"> </span>
                        <h3>Photo Title Here.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $('.owl-carousel1').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        navText: ["<i class = 'fa fa-chevron-left'></i>", "<i class = 'fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 4,
            },
            1000: {
                items: 6
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
                    <img src="images/service.png" alt="">
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
                            <img src="images/train-stuff.jpg" alt="">
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
                            <img src="images/metro-2.jpg" alt="">
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
                            <img src="images/forest.jpg" alt="">
                        </div>
                        <div class=" stext">
                            <h2>Etiam Vel Nequ</h2>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                        </div>
                    </div>
                    <div class="box flex">
                        <div class="img">
                            <img src="images/metro-3.jpg" alt="">
                        </div>
                        <div class="stext">
                            <h2>Etiam Vel Nequ</h2>
                            <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                            </p>
                        </div>
                    </div>
                    <div class="box flex">
                        <div class="img">
                            <img src="images/metro-4.jpg" alt="">
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

    <footer>
        <div class="container grid">
            <div class="box">
                <img src="images" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est laborum.</p>

                <div class="icon">
                    <i class="fa fa-facebook-f"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-youtube"></i>
                </div>
            </div>

            <div class="box">
                <h2>Links</h2>
                <ul>
                    <li><a class="links" href="about.php">About Us</a></li>
                    <li><a class="links" href="#contact">Contact Us</a></li>
                    <li><a class="links" href="#service">Services</a></li>
                    <li><a class="links" href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="box">
                <h2 id="contact">Contact Us</h2>
                <p>Lorem ipsum dolor sit amet constur adipisicing elit sed do eiusmtem por incid.
                </p>
                <i class="fa fa-location-dot"></i>
                <label>Galati</label> <br>
                <i class="fa fa-phone"></i>
                <label>[+40] 727800010</label> <br>
                <i class="fa fa-envelope"></i>
                <label>bm128@student.ugal.ro</label> <br>
            </div>
        </div>
    </footer>

    <div class="legal">
        <p class="container">Copyright © 2023 BogdanJMK All Rights Reserved.</p>
    </div>

    <script src="https://kit.fontawesome.com/032d11eac3.js" crossorigin="anonymous"></script>
</body>

</html>