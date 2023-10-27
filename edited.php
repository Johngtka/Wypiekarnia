<?php
require_once('PDO.php');
if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/Wypiekarnia/edit.php');
    exit();
} else {

    if (!ctype_digit($_POST['phone'])) {
        $_SESSION['noNumberCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
        header('Location: http://localhost/Wypiekarnia/edit.php');
        exit();
    }
    if (
        !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone'])
    ) {
        $user = $_SESSION['user'];
        $username = filter_input(INPUT_POST, 'login');
        $pass = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);

        $editData = [
            'newLogin' => $username,
            'newPassword' => $pass,
            'newEmail' => $email,
            'newPhone' => $phone
        ];

        $query = $db->prepare("UPDATE klijeci SET email=:uEmail, phone=:uPhone, login=:uName, password=:uPass WHERE login='{$user['login']}'");

        $query->bindValue(':uEmail', $editData['newEmail'], PDO::PARAM_STR);
        $query->bindValue(':uPhone', $editData['newPhone'], PDO::PARAM_INT);
        $query->bindValue(':uName', $editData['newLogin'], PDO::PARAM_STR);
        $query->bindValue(':uPass', $editData['newPassword'], PDO::PARAM_STR);

        $query->execute();

        $_SESSION['newLog'] = '<span style="color: green"><b>*Dane zaktualizowane, Zaloguj się ponownie</b></span>';

        header('Location: http://localhost/Wypiekarnia/logout.php');
    } else {
        $_SESSION['editErrorInfo'] = '<span style="color: red"><b>*Wpisz wszystkie dane!!!</b></span>';

        header('Location: edit.php');
    }
}
