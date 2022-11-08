<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location: edit.php');
    exit();
}
require_once "dbconnect.php";
$conn = @new mysqli($host, $user, $password, $database);
if ($conn->connect_errno != 0) {
    echo "Error:" . $conn->connect_errno;
} else {
    $name = $_POST['imie'];
    $nazwisko = $_POST['subname'];
    $adres = $_POST['mail'];
    $num = $_POST['telefon'];
    $username = $_POST['login'];
    $pass = $_POST['password'];
}
