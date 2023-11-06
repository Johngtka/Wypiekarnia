<?php
require_once('PDO.php');
if (!isset($_POST['login']) || !isset($_POST['password'])) {
  header('Location: http://localhost/Wypiekarnia/loginForm.php');
  exit();
} else {

  $login = filter_input(INPUT_POST, 'login');
  $password = filter_input(INPUT_POST, 'password');

  $query = $db->prepare("SELECT * FROM klijeci WHERE login=:uName AND password=:uPass");

  $query->bindValue(':uName', $login, PDO::PARAM_STR);
  $query->bindValue(':uPass', $password, PDO::PARAM_STR);

  if ($query->execute()) {

    $count = $query->rowCount();

    if ($count == 1) {

      $row = $query->fetch();

      $_SESSION['user'] = [
        'login' => $row['login'],
        'password' => $row['password'],
        'email' => $row['email']
      ];

      setcookie("sesUse", $row['login'], time() + (3600 * 24));

      unset($_SESSION['err']);

      header('Location: user.php');
    } else {
      $_SESSION['err'] = '<span style="color: red"><b>*Nieprawidłowy login lub hasło</b></span>';
      header('Location: http://localhost/Wypiekarnia/loginForm.php');
    }
  }
}
