<?php
@include '../database/config.php';

if (isset($_GET['nume_tren'])) {
  $query = "SELECT DISTINCT clasa FROM tren WHERE nume_tren=?";
  $stmt = mysqli_prepare($conn, $query);
  $nume_tren = $_GET['nume_tren'];
  mysqli_stmt_bind_param($stmt, 's', $nume_tren);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $options = '';
  while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="' . $row['clasa'] . '">' . $row['clasa'] . '</option>';
  }

  echo $options;
}
?>