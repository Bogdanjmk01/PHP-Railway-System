<?php
@include '../database/config.php';

if (isset($_GET['statie_plecare']) && isset($_GET['statie_sosire'])) {
    $statie_plecare = $_GET['statie_plecare'];
    $statie_sosire = $_GET['statie_sosire'];

    $query = "SELECT DISTINCT t.nume_tren
        FROM ruta ru
        JOIN statie s1 ON ru.statie_plecare_id = s1.id
        JOIN statie s2 ON ru.statie_sosire_id = s2.id
        JOIN tren t ON ru.id_tren = t.id
        WHERE s1.nume = ?
        AND s2.nume = ? ";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $statie_plecare, $statie_sosire);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['nume_tren'] . '">' . $row['nume_tren'] . '</option>';
        }
    }
?>