<?php
session_start();

@include '../database/config.php';

if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}

if (isset($_SESSION["email"])) {
    $query1 = "SELECT DISTINCT nume_tren FROM tren";
    $stmt1 = mysqli_prepare($conn, $query1);
    mysqli_stmt_execute($stmt1);
    $result1 = mysqli_stmt_get_result($stmt1);
    
}

if (isset($_POST["submit"])) {
    $nume_tren = $_POST["nume_tren"];
    $clasa = $_POST["clasa"];

    $query3 = "SELECT * FROM tren WHERE nume_tren = ? AND clasa = ? AND capacitate > 0";
    $stmt3 = mysqli_prepare($conn, $query3);
    mysqli_stmt_bind_param($stmt3, "ss", $nume_tren, $clasa);
    mysqli_stmt_execute($stmt3);
    $result3 = mysqli_stmt_get_result($stmt3);

    if (mysqli_num_rows($result3) > 0) {
        $message = "There are available seats for the selected train and class.";
        $color = "green";
    } else {
        $message = "Sorry, there are no available seats for the selected train and class.";
        $color = "red";
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
    <link rel="stylesheet" href="../css/rezervation.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<script>
$(function() {
    $('#nume_tren').on('change', function() {
        var selectedOption = $(this).val();
        $.ajax({
            url: 'get_clasa.php',
            data: {
                nume_tren: selectedOption
            },
            type: 'GET',
            success: function(data) {
                var nume_tren = document.getElementById('nume_tren');
                var clasa = document.getElementById('clasa');
                nume_tren.addEventListener('change', function() {
                    if (nume_tren.value !== '') {
                        clasa.disabled = false;
                    } else {
                        clasa.disabled = true;
                    }
                });
                $('#clasa').html(data);
            }
        });
    });

    $('#statie_sosire').prop('disabled', true);
});
</script>

<script>
$(function() {
    $('form').submit(function() {
        if ($('#clasa').prop('disabled')) {
            alert('Please select a train and class first.');
            return false;
        }
    });
});
</script>

<style>
.train-link {
    color: #c0c0c0;
}

.train-link:hover {
    color: #808080;
    transition: 0.6s;
}
</style>

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
        <div id="message"></div>
        <script>
        $(document).ready(function() {
            var message = "<?php if(isset($message)){echo $message;} ?>";
            if (message.trim() != '') {
                $("#message").html(message).css("color", "green");
            }
        });
        </script>

        <script>
        $(document).ready(function() {
            var message = "<?php if(isset($message)){echo $message;} ?>";
            if (message.trim() != '') {
                $("#message").html(message).css("color",
                    "<?php if(isset($error)){echo 'red';} else{echo 'green';} ?>");
            }
        });
        </script>
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
                    <li><a class="links" href="rezervation.php">reserve</a> </li>
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
        <header>Check availability for your ticket</header>
        <form method="post" class="form">
            <div class="input-box">
                <div class="select-box">
                    <select name="nume_tren" id="nume_tren">
                        <option hidden>Train Name</option>
                        <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                        <option value="<?php echo $row1['nume_tren']; ?>"><?php echo $row1['nume_tren']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="select-box">
                    <select name="clasa" id="clasa" disabled>
                        <option hidden>Class</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <button type="submit" name="submit">Check Availability</button>
            <div
                style="display:flex; align-items:center; justify-content:center; flex-direction:space-between; gap:10px">
                <p class="">Don't know the name of the train? </p>
                <a class="train-link" href="../trains.php"> Check out here</a>
            </div>
        </form>
    </section>

</body>

</html>