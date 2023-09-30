<?php
session_start();
unset($_SESSION['user'], $_COOKIE['sesuse'], $_SESSION['exportUserData']);
header("Location: http://localhost/Wypiekarnia/loginForm.php");
