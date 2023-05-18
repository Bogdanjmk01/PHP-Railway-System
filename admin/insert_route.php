<?php
session_start();
@include "../database/config.php";

if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}

if(isset($_POST['submit'])) {

    $id_tren = mysqli_real_escape_string($conn, $_POST['id_tren']);
    $statie_plecare_id = mysqli_real_escape_string($conn, $_POST['statie_plecare_id']);
    $statie_sosire_id = mysqli_real_escape_string($conn, $_POST['statie_sosire_id']);
    $timp_plecare = date('H:i:s', strtotime($_POST['timp_plecare']));
    $timp_sosire = date('H:i:s', strtotime($_POST['timp_sosire']));
 
    $select = " SELECT * FROM ruta WHERE  id_tren = '$id_tren' AND statie_plecare_id = '$statie_plecare_id' statie_sosire_id = '$statie_sosire_id' AND AND timp_plecare = '$timp_plecare' AND timp_sosire = '$timp_sosire'";
 
    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0) {
 
       $error[] = 'Route already exists!';
 
    } else {
 
       if($pass != $cpass) {
          $error[] = 'Passwords do not match!';
       }
       else {
          $insert = "INSERT INTO ruta(id_tren, statie_plecare_id, statie_sosire_id, timp_plecare,timp_sosire) VALUES('$id_tren','$statie_plecare_id','$statie_sosire_id','$timp_plecare','$timp_sosire')";
          mysqli_query($conn, $insert);
          header('location:insert_route.php');
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

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/authentication.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
            </div>
            <?php
    if ($_SESSION["email"]) {
        ?>
            <span class="logo_name">Welcome <?php echo $_SESSION["nume_angajat"]?> </span>
            <?php
    } else
        echo "<h1>Please login first .</h1>";
    ?>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="admin.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="insert_train.php">
                        <i class="uil uil-transaction"></i>
                        <span class="link-name">Add new Train</span>
                    </a></li>
                <li><a href="insert_route.php">
                        <i class="uil uil-subway"></i>
                        <span class="link-name">Add new Route</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Analytics</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="link-name">Like</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="../authentication/logout.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <ddiv class="login-box">
            <h2>Add Routes</h2>
            <form method="post">
                <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
                <div class="user-box">
                    <input type="text" name="id_tren" required="">
                    <label>Id Tren</label>
                </div>
                <div class="user-box">
                    <input type="text" name="statie_plecare_id" required="">
                    <label>Statie Plecare Id</label>
                </div>
                <div class="user-box">
                    <input type="text" name="statie_sosire_id" required="">
                    <label>Statie Sosire Id</label>
                </div>
                <div class="user-box">
                    <input type="text" name="timp_plecare" required="">
                    <label>Timp Plecare</label>
                </div>
                <div class="user-box">
                    <input type="text" name="timp_sosire" required="">
                    <label>Timp Sosire</label>
                </div>
                <button type="submit" name="submit" class="register-button">
                    Add Route
                </button>
            </form>
        </ddiv>
    </section>

    <script>
    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    let getMode = localStorage.getItem("mode");
    if (getMode && getMode === "dark") {
        body.classList.toggle("dark");
    }

    let getStatus = localStorage.getItem("status");
    if (getStatus && getStatus === "close") {
        sidebar.classList.toggle("close");
    }

    modeToggle.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            localStorage.setItem("mode", "dark");
        } else {
            localStorage.setItem("mode", "light");
        }
    });

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if (sidebar.classList.contains("close")) {
            localStorage.setItem("status", "close");
        } else {
            localStorage.setItem("status", "open");
        }
    })
    </script>
</body>

</html>