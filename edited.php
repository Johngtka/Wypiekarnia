<?php
require_once('PDO.php');
if (!isset($_SESSION['user'])) {
    header('Location: edit.php');
    exit();
} else {
    $user = $_SESSION['user'];
    $username = filter_input(INPUT_POST, 'login');
    $pass = filter_input(INPUT_POST, 'password');
    $adres = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    $num = filter_input(INPUT_POST, 'telefon');
    $editdata = [
        'login' => $username,
        'haslo' => $pass,
        'adres' => $adres,
        'telefon' => $num
    ];
    if (isset($editdata)) {
        $query = $db->prepare("UPDATE klijeci SET mail=:email, telefon=:num, logi=:uname, haslo=:pass WHERE logi='{$user['login']}'");
        $query->bindValue(':email', $editdata['adres'], PDO::PARAM_STR);
        $query->bindValue(':num', $editdata['telefon'], PDO::PARAM_INT);
        $query->bindValue(':uname', $editdata['login'], PDO::PARAM_STR);
        $query->bindValue(':pass', $editdata['haslo'], PDO::PARAM_STR);
        $query->execute();
        $_SESSION['newlog'] = '<span style="color: green"><b>*Dane zaktualizowane, Zaloguj się ponownie</b></span>;';
        header('Location: logout.php');
    }
}
