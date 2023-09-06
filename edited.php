<?php
require_once('PDO.php');
if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/Wypiekarnia/edit.php');
    exit();
} else {

    if(!ctype_digit($_POST['telefon'])){
        $_SESSION['noNumberCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
        header('Location: http://localhost/Wypiekarnia/edit.php');
        exit();
    }

    $user = $_SESSION['user'];
    $username = filter_input(INPUT_POST, 'login');
    $pass = filter_input(INPUT_POST, 'password');
    $location = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'telefon', FILTER_VALIDATE_INT);

    $editData = [
        'login' => $username,
        'haslo' => $pass,
        'adres' => $location,
        'telefon' => $phone
    ];

    if (isset($editData)) {
        $query = $db->prepare("UPDATE klijeci SET mail=:email, telefon=:num, logi=:uname, haslo=:pass WHERE logi='{$user['login']}'");
        $query->bindValue(':email', $editData['adres'], PDO::PARAM_STR);
        $query->bindValue(':num', $editData['telefon'], PDO::PARAM_INT);
        $query->bindValue(':uname', $editData['login'], PDO::PARAM_STR);
        $query->bindValue(':pass', $editData['haslo'], PDO::PARAM_STR);
        $query->execute();
        $_SESSION['newlog'] = '<span style="color: green"><b>*Dane zaktualizowane, Zaloguj się ponownie</b></span>;';
        header('Location: http://localhost/Wypiekarnia/logout.php');
    }
}