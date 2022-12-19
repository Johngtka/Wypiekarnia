<?php
session_start();
//warunek który sprawdza czy nie są ustawione jakieś wartości w formularzu logowania
if (!isset($_POST['login']) || !isset($_POST['password'])) {
  header('Location: konto.php');
  exit();
} else {
  //łączenie się z bazą i obsługa błędów instrukcji if w else jest program
  require_once "dbconnect.php";
  $conn = @new mysqli($host, $user, $password, $database);
  if ($conn->connect_errno != 0) {
    echo "Error:" . $conn->connect_errno;
  } else {
    //przypisanie wartości z logowania do zmiennych z uwzględnieniem polskich znaków
    $login = $_POST['login'];
    $haslo = $_POST['password'];
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    if ($result = @$conn->query(
      sprintf(
        "SELECT * FROM klijeci WHERE logi='%s' AND haslo='%s'",
        mysqli_real_escape_string($conn, $login),
        mysqli_real_escape_string($conn, $haslo)
      )/*warunek wykonujący polecenie wyszukujące urzytkownika zapisany w funkcji konwertującej dane wejściowe w jeden ciąg znaków i uniewarzniającej działanie wszelkich poleceń sql zapisanych w formularzu logowania w danych wejściowych*/
    )) {
      //ustawienie zmiennej ilość jako metody zmiennej z rezultatem zapytania zwracającej liczbe wierszy
      $ilosc = $result->num_rows;
      //przypisanie sesyjnych zmiennych do kolumn w bazie i przekierowanie do profilu użytkownika(proces logowania)
      if ($ilosc == 1) {
        //stworzenie z rezultatu zapytania tablicy skojarzeniowej
        $row = $result->fetch_assoc();
        //utworzenie obiektu zawierającego zmienne z wyciągniętymi z bazy danymi logowania z konkretnych kolumn w tabeli
        $_SESSION["user"] = [
          "id" => $row['id'],
          "login" => $row['logi'],
          "haslo" => $row['haslo'],
        ];
        unset($_SESSION['err']);
        header('Location: user.php');
      } else {
        //błędne dane logowania z informacją i zwrotką do logowania
        $_SESSION['err'] = '<span style="color: red"><b>*Nieprawidłowy login lub hasło</b></span>';
        header('Location: konto.php');
      }
    }
    $conn->close();
  }
}
