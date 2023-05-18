<?php
@include '../database/config.php';

if (isset($_GET['statie_plecare']) && isset($_GET['statie_sosire']) && isset($_GET['nume_tren'])) {
    $statie_plecare = $_GET['statie_plecare'];
    $statie_sosire = $_GET['statie_sosire'];
    $nume_tren = $_GET['nume_tren'];

    $query = "SELECT clasa
    FROM tren
    JOIN ruta ON tren.id = ruta.id_tren
    JOIN statie AS statie_plecare ON ruta.statie_plecare_id = statie_plecare.id
    JOIN statie AS statie_sosire ON ruta.statie_sosire_id = statie_sosire.id
    WHERE statie_plecare.nume = ? AND statie_sosire.nume = ? AND tren.nume_tren =?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $statie_plecare, $statie_sosire,$nume_tren);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['clasa'] . '">' . $row['clasa'] . '</option>';
        }
    }
?>