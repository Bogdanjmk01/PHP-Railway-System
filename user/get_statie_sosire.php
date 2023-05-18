<?php
@include '../database/config.php';

if (isset($_GET['statie_plecare'])) {
    $query = "SELECT DISTINCT s2.nume AS statie_sosire
    FROM ruta ru
    JOIN statie s1 ON ru.statie_plecare_id = s1.id
    JOIN statie s2 ON ru.statie_sosire_id = s2.id
    WHERE s1.nume = ?
    GROUP BY statie_sosire";
  $stmt = mysqli_prepare($conn, $query);
  $statie_plecare = $_GET['statie_plecare'];
  mysqli_stmt_bind_param($stmt, 's', $statie_plecare);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $options = '';
  while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="' . $row['statie_sosire'] . '">' . $row['statie_sosire'] . '</option>';
  }

  echo $options;
}
?>