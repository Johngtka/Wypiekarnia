<?php
// podłączenie pod silnik PDO
require_once("PDO.php");
//warunek który sprawdza czy nie są ustawione login i hasło w formularzu logowania
if (!isset($_POST['login']) || !isset($_POST['password'])) {
  header('Location: konto.php');
  exit();
} else {
  //przypisanie wartości z logowania do zmiennych
  $login = $_POST['login'];
  $haslo = $_POST['password'];

  // $login = htmlentities($login, ENT_QUOTES, "UTF-8");
  // $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

  // przepuszczenie wartości z formularza logowania przez filtrację
  $login = filter_input(INPUT_POST, 'login');
  $haslo = filter_input(INPUT_POST, 'password');

  // przygotowanie polecenia sql bez wartości które są tagami
  $query = $db->prepare("SELECT * FROM klijeci WHERE logi=:uname AND haslo=:haslo");

  // procedura bindowania wartości pod tagi które są przesyłane w zapytaniu
  $query->bindValue(':uname', $login, PDO::PARAM_STR);
  $query->bindValue(':haslo', $haslo, PDO::PARAM_STR);

  // sprawdzenie czy zostało poprawnie wykonane polecenie
  if ($query->execute()) {
    //ustawienie zmiennej ilość która zawiera zwróconą liczbe wierszy przez zapytanie
    $ilosc = $query->rowCount();
    // sprawdzenie czy wynik zapytania jest koniecznie równy 1 
    if ($ilosc == 1) {
      //zastosowanie metody która daje ostęp do kolumn poprawnego polecenia z tabeli
      $row = $query->fetch();
      // sesyjna tablica asocjacyjna zalogowanego poprawnie użytkownika która zawiera asocjacje do kolumn tabeli zwróconych poprawnym wykonaniem polecenia
      $_SESSION["user"] = [
        "id" => $row['id'],
        "login" => $row['logi'],
        "haslo" => $row['haslo'],
      ];
      // ustawienie ciasteczka pod login użytkownika który trwa przez 24h
      setcookie("sesuse", $row['logi'], time() + 86400);
      unset($_SESSION['err']);
      header('Location: user.php');
    } else {
      // info o niepoprawnych danych logowania
      $_SESSION['err'] = '<span style="color: red"><b>*Nieprawidłowy login lub hasło</b></span>';
      header('Location: konto.php');
    }
  }
}
