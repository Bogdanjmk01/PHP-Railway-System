<?php

@include 'database/config.php';
session_start();

   $select = "SELECT tren.nume_tren, tren.numar_tren, tren.tip, tren.capacitate, tren.clasa, ruta.timp_plecare, ruta.timp_sosire, statie_plecare.nume AS statie_plecare_nume, statie_plecare.adresa AS statie_plecare_adresa, statie_sosire.nume AS statie_sosire_nume, statie_sosire.adresa AS statie_sosire_adresa FROM tren JOIN ruta ON tren.id = ruta.id_tren JOIN statie AS statie_plecare ON ruta.statie_plecare_id = statie_plecare.id JOIN statie AS statie_sosire ON ruta.statie_sosire_id = statie_sosire.id ORDER BY ruta.timp_plecare; ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) == 0) {

      $error[] = 'No trains available at the moment';

   } 

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #32312f;
        font-family: sans-serif;
    }

    .welcome-message {
        color: #fafafa;
    }

    .table-container {
        padding: 0 10%;
        margin: 40px auto 0;
    }

    .heading {
        font-size: 40px;
        text-align: center;
        color: #f1f1f1;
        margin-bottom: 40px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table thead {
        background-color: #ee2828;
    }

    .table thead tr th {
        font-size: 14px;
        font-weight: medium;
        letter-spacing: 0.35px;
        color: #FFFFFF;
        opacity: 1;
        padding: 12px;
        vertical-align: top;
        border: 1px solid #dee2e685;
    }

    .table tbody tr td {
        font-size: 14px;
        letter-spacing: 0.35px;
        font-weight: normal;
        color: #f1f1f1;
        background-color: #3c3f44;
        padding: 8px;
        text-align: center;
        border: 1px solid #dee2e685;
    }

    .table .text_open {
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 0.35px;
        color: #FF1046;
    }

    .table .tbody tr td .btn {
        width: 130px;
        text-decoration: none;
        line-height: 35px;
        display: inline-block;
        background-color: #FF1046;
        font-weight: medium;
        color: #FFFFFF;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        font-size: 14px;
        opacity: 1;
    }

    @media (max-width: 768px) {
        .table thead {
            display: none;
        }

        .table,
        .table tbody,
        .table tr,
        .table td {
            display: block;
            width: 100%;
        }

        .table tr {
            margin-bottom: 15px;
        }

        .table tbody tr td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        .table td:before {
            content: attr(data-label);
            position: absolut;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-weight: 14px;
            text-align: left;
        }
    }
    </style>
</head>

<body>
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
                    <li><a class="links" href="about.php">about</a> </li>
                    <span class="welcome-message">Welcome
                        <?php echo $_SESSION["firstName"] . ' ' . $_SESSION["lastName"]; ?></span>
                    <li><a class="links" href="authentication/logout.php" tite="Logout">logout</a></li>
                    <li><a class="links" href="user/rezervation.php">rezerve</a> </li>
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
                    <li><a class="links" href="index.php">home</a> </li>
                    <li><a class="links" href="about.php">about</a> </li>
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

    <div class="table-container">
        <h1 class="heading">List of Trains</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Train Name</th>
                    <th>Train Number</th>
                    <th>Type</th>
                    <th>Capacity</th>
                    <th>Class</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Departure Station</th>
                    <th>Departure Address</th>
                    <th>Arrival Station</th>
                    <th>Arrival Address</th>
                    <th>Book your seat</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['nume_tren']; ?></td>
                    <td><?php echo $row['numar_tren']; ?></td>
                    <td><?php echo $row['tip']; ?></td>
                    <td><?php echo $row['capacitate']; ?></td>
                    <td><?php echo $row['clasa']; ?></td>
                    <td><?php echo $row['timp_plecare']; ?></td>
                    <td><?php echo $row['timp_sosire']; ?></td>
                    <td><?php echo $row['statie_plecare_nume']; ?></td>
                    <td><?php echo $row['statie_plecare_adresa']; ?></td>
                    <td><?php echo $row['statie_sosire_nume']; ?></td>
                    <td><?php echo $row['statie_sosire_adresa']; ?></td>
                    <td><a href="user/rezervation.php">
                            <button class="secondary-btn">Rezerve</button>
                        </a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="legal" style="margin-top: 30%;">
        <p class="container">Copyright © 2023 BogdanJMK All Rights Reserved.</p>
    </div>
</body>

</html>