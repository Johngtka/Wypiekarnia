<?php
// podłączenie pod silnik PDO
require_once('PDO.php');
//warunek który sprawdza czy nie są ustawione login i hasło w formularzu logowania
if (!isset($_POST['login']) || !isset($_POST['password'])) {

  header('Location: http://localhost/Wypiekarnia/loginForm.php');
  exit();
} else {

  // przepuszczenie wartości z pól formularza logowania przez filtrację
  $login = filter_input(INPUT_POST, 'login');
  $password = filter_input(INPUT_POST, 'password');

  // przygotowanie polecenia sql bez wartości które są bindami
  $query = $db->prepare("SELECT * FROM klijeci WHERE login=:uName AND password=:uPAss");

  // procedura bindowania wartości pod tagi które są przesyłane w zapytaniu
  $query->bindValue(':uName', $login, PDO::PARAM_STR);
  $query->bindValue(':uPass', $password, PDO::PARAM_STR);

  // sprawdzenie czy zostało poprawnie wykonane polecenie
  if ($query->execute()) {

    //ustawienie zmiennej ilość która zawiera zwróconą liczbe wierszy przez zapytanie
    $count = $query->rowCount();

    // sprawdzenie czy wynik zapytania jest koniecznie równy 1 
    if ($count == 1) {

      //zastosowanie metody która daje ostęp do kolumn poprawnego polecenia z tabeli
      $row = $query->fetch();

      // sesyjna tablica asocjacyjna zalogowanego poprawnie użytkownika która zawiera asocjacje do kolumn tabeli zwróconych poprawnym wykonaniem polecenia
      $_SESSION['user'] = [
        'login' => $row['login'],
        'password' => $row['password'],
        'email' => $row['email']
      ];

      // ustawienie ciasteczka pod login użytkownika który trwa przez 24h
      setcookie("sesUse", $row['login'], time() + (3600 * 24));

      unset($_SESSION['err']);

      header('Location: user.php');
    } else {
      // info o niepoprawnych danych logowania
      $_SESSION['err'] = '<span style="color: red"><b>*Nieprawidłowy login lub hasło</b></span>';
      header('Location: http://localhost/Wypiekarnia/loginForm.php');
    }
  }
}
