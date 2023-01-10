<?php
session_start();
unset($_SESSION['user'], $_COOKIE['sesuse']);
header("Location: konto.php");
