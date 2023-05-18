<?php
session_start();
@include "../database/config.php";

if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $selectUser = "SELECT prenume, nume, adresa, numar_telefon, email FROM client WHERE id = '$id'";
    $resultUser = mysqli_query($conn, $selectUser);
    $user = mysqli_fetch_assoc($resultUser);
} else {
    header("location: admin.php");
    exit();
}
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
        <div class="login-box">
            <h2>Edit Details</h2>
            <form method="post" action="update_user.php">
                <div class="user-box">
                    <input type="text" name="prenume" required="" value="<?php echo $user['prenume']; ?>">
                    <label>First Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="nume" required="" value="<?php echo $user['nume']; ?>">
                    <label>Last Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="adresa" required="" value="<?php echo $user['adresa']; ?>">
                    <label>Address</label>
                </div>
                <div class="user-box">
                    <input type="text" name="numar_telefon" required="" value="<?php echo $user['numar_telefon']; ?>">
                    <label>Phone Number</label>
                </div>
                <div class="user-box">
                    <input type="email" name="email" required="" value="<?php echo $user['email']; ?>">
                    <label>Email</label>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="update" class="register-button">Update</button>
            </form>
        </div>
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