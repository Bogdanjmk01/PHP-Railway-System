<?php
session_start();
@include "../database/config.php";

if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}
if(isset($_SESSION["email"])){

 $email = $_SESSION['email'];

$data = array();
$select = "SELECT id,prenume,nume,adresa,numar_telefon,email FROM client;";

$result = mysqli_query($conn, $select);

while($row = mysqli_fetch_assoc($result)) {
    $data['First Name'][] = $row['prenume'];
    $data['Last Name'][] = $row['nume'];
    $data['Address'][] = $row['adresa'];
    $data['Phone Number'][] = $row['numar_telefon'];
    $data['Email'][] = $row['email'];
    $data['Edit'][] = '<a class="primary-btn" href="edit_user.php?id=' . $row['id'] . '">Edit</a>';
    $data['Delete'][] = '<input type="hidden" name="id" value="' . $row['id'] . '"><button class="secondary-btn" type="submit" name="delete">Delete</button>';;
}

if(mysqli_num_rows($result) == 0) {

    $error[] = 'No customers are available at the moment';

    }

    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $delete = "DELETE FROM client WHERE id = '$id'";
        mysqli_query($conn, $delete);
        header("location: admin.php");
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
    <link rel="stylesheet" href="../css/admin.css">

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

    <form method="post">
        <section class="dashboard">
            <div class="top">
                <i class="uil uil-bars sidebar-toggle"></i>

                <div class="search-box">
                    <i class="uil uil-search"></i>
                    <input type="text" placeholder="Search here...">
                </div>
            </div>

            <div class="dash-content">
                <div class="overview">
                    <div class="title">
                    </div>

                    <div class="boxes">
                        <div class="box box1">
                            <i class="uil uil-thumbs-up"></i>
                            <span class="text">Total Likes</span>
                            <span class="number">50,120</span>
                        </div>
                        <div class="box box2">
                            <i class="uil uil-comments"></i>
                            <span class="text">Comments</span>
                            <span class="number">20,120</span>
                        </div>
                        <div class="box box3">
                            <i class="uil uil-share"></i>
                            <span class="text">Total Share</span>
                            <span class="number">10,120</span>
                        </div>
                    </div>
                </div>

                <div class="activity">
                    <div class="title">
                        <i class="uil uil-clock-three"></i>
                        <span class="text">Recent Activity</span>
                    </div>

                    <div class="activity-data">
                        <?php foreach($data as $key => $column) { ?>
                        <div class="data <?php echo strtolower($key); ?>">
                            <span class="data-title"><?php echo $key; ?></span>
                            <?php foreach($column as $value) { ?>
                            <?php if ($key == 'Edit') {
                        echo '<span class="data-list">' . $value . '</span>';
                        } elseif ($key == 'Delete') {
                        echo  $value;
                        } else {
                        echo '<span class="data-list">' . $value . '</span>';
                        }
                        ?>
                            <?php 
                    } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </form>

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