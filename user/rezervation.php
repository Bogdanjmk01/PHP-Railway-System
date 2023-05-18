<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}

@include '../database/config.php';

if(isset($_POST['submit'])) {
    
    $departureStation = $_POST['departureStation'];
    $arrivalStation = $_POST['arrivalStation'];
    $trainName = $_POST['trainName'];
    $departureDate = date('Y-m-d',strtotime($_POST['departureDate']));
    $collumn = $_POST['collumn'];
    $row = $_POST['row'];
    $price = $_POST['price'];
    $class = $_POST['class'];
    $passengers = $_POST['passengers'];
    $email = $_SESSION['email'];

    $insert1 = "INSERT INTO rezervare (id_client, id_ruta, data_plecare)
    SELECT c.id, r.id, ?
    FROM client c 
    JOIN ruta r ON r.id_tren = (
        SELECT id 
        FROM tren 
        WHERE nume_tren = ? 
            AND clasa = ? 
            AND statie_plecare_id = (
                SELECT id 
                FROM statie 
                WHERE nume = ? 
                LIMIT 1
            ) 
            AND statie_sosire_id = (
                SELECT id 
                FROM statie 
                WHERE nume = ? 
                LIMIT 1
            )
        LIMIT 1
    )
    WHERE c.email = ?;";
    
    $stmt1 = mysqli_prepare($conn, $insert1);
    mysqli_stmt_bind_param($stmt1, 'ssssss', $departureDate, $trainName, $class, $departureStation, $arrivalStation, $email);
    mysqli_stmt_execute($stmt1);

    $insert2 = "INSERT INTO locuri (id_tren, rand, coloana) 
    SELECT t.id, ?, ? 
    FROM tren t 
    WHERE t.nume_tren = ? 
    AND t.clasa = ?";
    $stmt2 = mysqli_prepare($conn, $insert2);
    mysqli_stmt_bind_param($stmt2, 'ssss', $row, $collumn, $trainName, $class);
    mysqli_stmt_execute($stmt2);

    $insert3 = "INSERT INTO bilet_locuri (id_bilet, id_loc) VALUES ((SELECT bilet.id FROM bilet JOIN ruta ON bilet.id_ruta = ruta.id AND bilet.pret = ? LIMIT 1), (SELECT id FROM locuri ORDER BY id DESC LIMIT 1));";
    $stmt3 = mysqli_prepare($conn, $insert3);
    mysqli_stmt_bind_param($stmt3, 's', $price);
    mysqli_stmt_execute($stmt3);

    $insert4 = "UPDATE tren SET capacitate = capacitate - ? WHERE nume_tren = ?";
    $stmt4 = mysqli_prepare($conn, $insert4);
    mysqli_stmt_bind_param($stmt4, 'ss', $passengers, $trainName);
    mysqli_stmt_execute($stmt4);

    header('location:show_rezervations.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/rezervation.css">
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
            <div class="nav-links">
                <ul id="menulist">
                    <li><a class="links" href="../about.php">about</a> </li>
                    <span class="welcome-message">Welcome
                        <?php echo $_SESSION["firstName"] . ' ' . $_SESSION["lastName"]; ?></span>
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

    <section class="container">
        <header>Book your seat</header>
        <form method="post" class="form">
            <div class="input-box">
                <label>Departure Station</label>
                <input type="text" name="departureStation" placeholder="Enter departure station" required />
            </div>

            <div class="input-box">
                <label>Arrival Station</label>
                <input type="text" name="arrivalStation" placeholder="Enter arrival station" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Train Name</label>
                    <input type="text" name="trainName" placeholder="Enter train name" required />
                </div>
                <div class="input-box">
                    <label>Departure Date</label>
                    <input type="date" name="departureDate" placeholder="Enter departure date" required />
                </div>
            </div>
            <div class="input-box address">
                <label>Train Details</label>
                <input type="text" name="collumn" placeholder="Enter collumn" required />
                <input type="text" name="row" placeholder="Enter row" required />
                <div class="column">
                    <div class="select-box">
                        <select name="price">
                            <option hidden>Price(RON)</option>
                            <option>30.00</option>
                            <option>50.00</option>
                        </select>
                    </div>
                    <div class="select-box">
                        <select name="class">
                            <option hidden>Class</option>
                            <option>1</option>
                            <option>Economica</option>
                        </select>
                    </div>
                </div>
                <input type="text" name="passengers" placeholder="Enter number of passengers" required />
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </section>
</body>

</html>