<?php

@include '../database/config.php';
session_start();

if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}

if (isset($_SESSION["email"])) {
    $email = $_SESSION['email'];

    $select = "SELECT
        c.nume,
        c.prenume,
        s1.nume AS statie_sosire,
        s2.nume AS statie_plecare,
        t.nume_tren,
        t.numar_tren,
        t.clasa,
        b.pret,
        r.data_plecare,
        l.rand,
        l.coloana
        FROM
            client c
            JOIN rezervare r ON c.id = r.id_client
            JOIN ruta ru ON r.id_ruta = ru.id
            JOIN statie s1 ON ru.statie_sosire_id = s1.id
            JOIN statie s2 ON ru.statie_plecare_id = s2.id
            JOIN tren t ON ru.id_tren = t.id
            JOIN bilet b ON r.id_ruta = b.id_ruta
            JOIN bilet_locuri bl ON bl.id_bilet = b.id
            JOIN locuri l ON l.id = bl.id_loc
            WHERE email = ?";

    $stmt1 = mysqli_prepare($conn, $select);
    mysqli_stmt_bind_param($stmt1, "s", $email);
    mysqli_stmt_execute($stmt1);
    $result = mysqli_stmt_get_result($stmt1);

    if (mysqli_num_rows($result) == 0) {

        $error[] = 'You have no rezervations available';

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
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
                        <?php echo $_SESSION["firstName"] . ' ' . $_SESSION["lastName"]; ?>
                    </span>
                    <li><a class="links" href="authentication/logout.php" tite="Logout">logout</a></li>
                    <li><a class="links" href="rezervation.php">rezerve</a> </li>
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
                    <li><a class="links" href="landing.php">home</a> </li>
                    <li><a class="links" href="../about.php">about</a> </li>
                    <li><a class="links" href="../authentication/login.php" tite="Logout">login</a></li>
                    <li><a class="links" href="../authentication/register.php">register</a> </li>
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
        <h1 class="heading">Rezervations</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Arrival Station</th>
                    <th>Departure Station</th>
                    <th>Train Name</th>
                    <th>Train Number</th>
                    <th>Class</th>
                    <th>Price</th>
                    <th>Row</th>
                    <th>Collumn</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>
                        <?php echo $row['nume']; ?>
                    </td>
                    <td>
                        <?php echo $row['prenume']; ?>
                    </td>
                    <td>
                        <?php echo $row['statie_sosire']; ?>
                    </td>
                    <td>
                        <?php echo $row['statie_plecare']; ?>
                    </td>
                    <td>
                        <?php echo $row['nume_tren']; ?>
                    </td>
                    <td>
                        <?php echo $row['numar_tren']; ?>
                    </td>
                    <td>
                        <?php echo $row['clasa']; ?>
                    </td>
                    <td>
                        <?php echo $row['pret']; ?>
                    </td>
                    <td>
                        <?php echo $row['rand']; ?>
                    </td>
                    <td>
                        <?php echo $row['coloane']; ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>