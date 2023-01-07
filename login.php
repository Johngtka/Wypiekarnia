<?php
require_once("PDO.php");
//warunek który sprawdza czy nie są ustawione jakieś wartości w formularzu logowania
if (!isset($_POST['login']) || !isset($_POST['password'])) {
  header('Location: konto.php');
  exit();
} else {
  //przypisanie wartości z logowania do zmiennych z uwzględnieniem polskich znaków
  $login = $_POST['login'];
  $haslo = $_POST['password'];

  // $login = htmlentities($login, ENT_QUOTES, "UTF-8");
  // $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

  $login = filter_input(INPUT_POST, 'login');
  $haslo = filter_input(INPUT_POST, 'password');

  $query = $db->prepare("SELECT * FROM klijeci WHERE logi=:uname AND haslo=:haslo");

  $query->bindValue(':uname', $login, PDO::PARAM_STR);
  $query->bindValue(':haslo', $haslo, PDO::PARAM_STR);

  if ($query->execute()) {
    //ustawienie zmiennej ilość jako metody zmiennej z rezultatem zapytania zwracającej liczbe wierszy
    $ilosc = $query->rowCount();
    //przypisanie sesyjnych zmiennych do kolumn w bazie i przekierowanie do profilu użytkownika(proces logowania)
    if ($ilosc == 1) {
      //stworzenie z rezultatu zapytania tablicy skojarzeniowej
      $row = $query->fetch();
      //utworzenie obiektu zawierającego zmienne z wyciągniętymi z bazy danymi logowania z konkretnych kolumn w tabeli
      $_SESSION["user"] = [
        "id" => $row['id'],
        "login" => $row['logi'],
        "haslo" => $row['haslo'],
      ];
      setcookie("sesuse", $row['logi'], time() + 86400);
      unset($_SESSION['err']);
      header('Location: user.php');
    } else {
      //błędne dane logowania z informacją i zwrotką do logowania
      $_SESSION['err'] = '<span style="color: red"><b>*Nieprawidłowy login lub hasło</b></span>';
      header('Location: konto.php');
    }
  }
}
