<?php
require_once('PDO.php');
if (!isset($_SESSION["user"])) {
    header('Location: edit.php');
    exit();
} else {
    $name = $_POST['imie'];
    $nazwisko = $_POST['subname'];
    $adres = $_POST['mail'];
    $num = $_POST['telefon'];
    $username = $_POST['login'];
    $pass = $_POST['password'];
    $conn->close();
}
