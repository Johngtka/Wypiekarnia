<?php
session_start();
unset($_SESSION['user'], $_COOKIE['sesuse'], $_SESSION['profile']);
header("Location: konto.php");
