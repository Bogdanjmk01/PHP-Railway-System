<?php
session_start();
@include "../database/config.php";

if (!isset($_SESSION["email"])) {
    header("location: ../authentication/login.php");
    exit();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $prenume = $_POST['prenume'];
    $nume = $_POST['nume'];
    $adresa = $_POST['adresa'];
    $numar_telefon = $_POST['numar_telefon'];
    $email = $_POST['email'];

    $updateUser = "UPDATE client SET prenume = '$prenume', nume = '$nume', adresa = '$adresa', numar_telefon = '$numar_telefon', email = '$email' WHERE id = '$id'";
    mysqli_query($conn, $updateUser);

    header("location: admin.php");
    exit();
}
?>