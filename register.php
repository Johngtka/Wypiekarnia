<?php
// podłączenie się do silnika pdo
require_once('PDO.php');

//warunek który sprawdza czy nie są ustawione login i hasło w formularzu logowania
if (!isset($_POST['login']) && !isset($_POST['password'])) {
  header('Location: registerForm.php');
  exit();
} else {

  if (!ctype_digit($_POST['phone'])) {
    $_SESSION['noNumberCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
    header('Location: http://localhost/Wypiekarnia/registerForm.php');
    exit();
  }

  // przepuszczenie wartości z formularza rejestracji przez filtrację

  $name = filter_input(INPUT_POST, 'name');
  $surname = filter_input(INPUT_POST, 'surname');
  $email = filter_input(INPUT_POST, 'location', FILTER_VALIDATE_EMAIL);
  $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
  $uname = filter_input(INPUT_POST, 'login');
  $pass = filter_input(INPUT_POST, 'password');

  // lokalna tablica asocjacyjna zawierająca połączenie skojażenia z danymi z filtracji

  $regTab = [
    'name' => $name,
    'surName' => $surname,
    'email' => $email,
    'phone' => $phone,
    'login' => $uname,
    'password' => $pass
  ];

  // sprawdzenie czy przefiltrowane dane są ustawione
  if (isset($regTab)) {
    // przygotowanie polecenia które sprawdzi czy już istnieje taki user
    $checkUser = $db->prepare("SELECT * FROM klijeci WHERE login=:uLogin AND email=:email");

    $checkUser->bindParam(':uLogin', $regTab['login'], PDO::PARAM_STR);
    $checkUser->bindParam(':email', $regTab['email'], PDO::PARAM_STR);

    $checkUser->execute();
    // warunek sprawdzający czy wynik zapytania jest poprawny

    if ($checkUser->rowCount() == 1) {

      $_SESSION['errchx'] = '<span style="color: red"><b>*Taki użytkownik już istnieje</b></span>';
      header('Location: http://localhost/Wypiekarnia/registerForm.php');
      exit();
    } else {
      unset($_SESSION['errchx']);
      // przygotowanie polecenia które wstawi usera 

      $query = $db->prepare("INSERT INTO klijeci VALUES (NULL,:name,:surName,:email,:phone,:login,:password)");

      // proces bindowania wartości z filtracji z tablicy asocjacyjnej pod dane tagi w zapytaniu
      $query->bindValue(':name', $regTab['name'], PDO::PARAM_STR);
      $query->bindValue(':surName', $regTab['surName'], PDO::PARAM_STR);
      $query->bindValue(':email', $regTab['email'], PDO::PARAM_STR);
      $query->bindValue(':phone', $regTab['phone'], PDO::PARAM_INT);
      $query->bindValue(':login', $regTab['login'], PDO::PARAM_STR);
      $query->bindValue(':password', $regTab['password'], PDO::PARAM_STR);
      $query->execute();

      $_SESSION['exportUserData'] = $regTab['login'];

      header('Location: welcome.php');
    }
  } else {
    header('Location: http://localhost/Wypiekarnia/registerForm.php');
    exit();
  }
}
