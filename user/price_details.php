<?php
session_start();

@include '../database/config.php';

if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}

if (isset($_SESSION["email"])) {
    $query1 = "SELECT DISTINCT statie.nume AS statie_plecare FROM statie,ruta WHERE statie.id=ruta.statie_plecare_id;";
    $stmt1 = mysqli_prepare($conn, $query1);
    mysqli_stmt_execute($stmt1);
    $result1 = mysqli_stmt_get_result($stmt1);
}

if (isset($_POST["submit"])) {

    $statie_plecare = $_POST["statie_plecare"];
    $statie_sosire = $_POST["statie_sosire"];
    $nume_tren = $_POST["nume_tren"];
    $clasa = $_POST["clasa"];

    $query2 = "SELECT b.pret
           FROM ruta ru 
           JOIN tren t ON ru.id_tren = t.id
           JOIN statie s1 ON ru.statie_plecare_id = s1.id 
           JOIN statie s2 ON ru.statie_sosire_id = s2.id 
           JOIN bilet b ON ru.id = b.id_ruta
           WHERE s1.nume = ?
           AND s2.nume = ?
           AND t.nume_tren = ?
           AND t.clasa = ?";

    $stmt2 = mysqli_prepare($conn, $query2);
    mysqli_stmt_bind_param($stmt2, "ssss", $nume_tren, $statie_plecare, $statie_sosire, $clasa);
    mysqli_stmt_execute($stmt2);
    $result2 = mysqli_stmt_get_result($stmt2);

    if ($row = mysqli_fetch_assoc($result2)) {
        $price = $row["pret"];
        $message = "The price is " . $price;
        $color = "green";
    } else {
        $message = "Sorry, there are no journey is not available for the selected train and class.";
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

<html>

<body>
    <div id="price"></div>
    <script>
    $(function() {
        $('#statie_plecare').on('change', function() {
            var selectedOption = $(this).val();
            $.ajax({
                url: 'get_statie_sosire.php',
                data: {
                    statie_plecare: selectedOption
                },
                type: 'GET',
                success: function(data) {
                    var statie_plecare = document.getElementById('statie_plecare');
                    var statie_sosire = document.getElementById('statie_sosire');
                    statie_plecare.addEventListener('change', function() {
                        if (statie_plecare.value !== '') {
                            statie_sosire.disabled = false;
                        } else {
                            statie_sosire.disabled = true;
                        }
                    });
                    $('#statie_sosire').html(data);
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
                alert('Please select values from the dropdowns first.');
                return false;
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#statie_plecare, #statie_sosire').on('change', function() {
            var statie_plecare = $('#statie_plecare').val();
            var statie_sosire = $('#statie_sosire').val();

            if (statie_plecare != '' && statie_sosire != '') {
                $.ajax({
                    url: 'get_nume_tren.php', // URL of the script that will get the data
                    type: 'GET',
                    data: {
                        statie_plecare: statie_plecare,
                        statie_sosire: statie_sosire
                    },
                    success: function(response) {
                        $('#nume_tren').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error getting trains:', errorThrown);
                    }
                });
            } else {
                $('#nume_tren').empty().append($('<option>').val('').text('Select train'));
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#statie_plecare, #statie_sosire').on('change', function() {
            var statie_plecare = $('#statie_plecare').val();
            var statie_sosire = $('#statie_sosire').val();

            if (statie_plecare != '' && statie_sosire != '') {
                $.ajax({
                    url: 'get_nume_tren.php', // URL of the script that will get the data
                    type: 'GET',
                    data: {
                        statie_plecare: statie_plecare,
                        statie_sosire: statie_sosire
                    },
                    success: function(response) {
                        $('#nume_tren').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error getting trains:', errorThrown);
                    }
                });
            } else {
                $('#nume_tren').empty().append($('<option>').val('').text('Select train'));
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#statie_plecare, #statie_sosire').on('change', function() {
            var statie_plecare = $('#statie_plecare').val();
            var statie_sosire = $('#statie_sosire').val();
            var nume_tren = $('#nume_tren').val();

            if (statie_plecare != '' && statie_sosire != '' && nume_tren != '') {
                $.ajax({
                    url: 'get_class.php', // URL of the script that will get the data
                    type: 'GET',
                    data: {
                        statie_plecare: statie_plecare,
                        statie_sosire: statie_sosire,
                        nume_tren: nume_tren,
                    },
                    success: function(response) {
                        $('#clasa').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error getting train class:', errorThrown);
                    }
                });
            } else {
                $('#clasa').empty().append($('<option>').val('').text('Select class'));
            }
        });
    });
    </script>

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
            var message = "<?php if (isset($message)) {
                                        echo $message;
                                    } ?>";
            if (message.trim() != '') {
                $("#message").html(message).css("color",
                    "<?php if (isset($error)) {
                                    echo 'red';
                                } else {
                                    echo 'green';
                                } ?>");
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
                    <select name="statie_plecare" id="statie_plecare">
                        <option hidden>Departure Station</option>
                        <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                        <option value="<?php echo $row1['statie_plecare']; ?>"><?php echo $row1['statie_plecare']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="select-box">
                    <select name="statie_sosire" id="statie_sosire">
                        <option hidden>Arrival Station</option>
                    </select>
                </div>
                <div class="select-box">
                    <select name="nume_tren" id="nume_tren">
                        <option hidden>Train Name</option>
                    </select>
                </div>
                <div class="select-box">
                    <select name="clasa" id="clasa">
                        <option hidden>Class</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="submit" id="submit">Check Price</button>
            <div
                style="display:flex; align-items:center; justify-content:center; flex-direction:space-between; gap:10px">
                <p class="">Don't know the name of the train? </p>
                <a class="train-link" href="../trains.php"> Check out here</a>
            </div>
        </form>
    </section>
</body>

</html>