<?php
      session_start();
      //zabezpieczenie przed włamaniem do profilu użytkownika
      if(!isset($_POST['login']) || !isset($_POST['password'])){
        header('Location: konto.php');
        exit();
      }
        //łączenie się z bazą i obsługa błędów instrukcji if w else jest program
        require_once "dbconnect.php";
        $conn = @new mysqli($host, $user, $password, $database);
        if ($conn->connect_errno!=0){
          echo "Error:".$conn->connect_errno;
        }
        else{
          //przypisanie wartości z logowania do zmiennych z uwzględnieniem polskich znaków
          $login = $_POST['login'];
          $haslo = $_POST['password'];
          $login = htmlentities($login,ENT_QUOTES,"UTF-8");
          $haslo = htmlentities($haslo,ENT_QUOTES,"UTF-8");
          //wysłanie zapytania do bazy z dołączonym zabezpieczeniem przed wstrzykiwaniem sql
          if ($result = @$conn->query(
            sprintf("SELECT * FROM klijeci WHERE logi='%s' AND haslo='%s'", 
            mysqli_real_escape_string($conn,$login), 
            mysqli_real_escape_string($conn,$haslo))))
            {
            $ilosc = $result->num_rows;
            //przypisanie zmiennych do kolumn w bazie i przekierowanie do profilu użytkownika(proces logowania)
            if($ilosc==1){
                $_SESSION['zalogowany'] = true;
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['logi'];
                $_SESSION['haslo'] = $row['haslo'];
                unset($_SESSION['err']);
                $result->free();
                header('Location: user.php');
            }else{
              //błędne dane logowania z informacją i zwrotką do logowania
                 $_SESSION['err'] = '<span style="color: red"><b>*Nieprawidłowy login lub hasło</b></span>';  
                 header('Location: konto.php');
            }
          }
          $conn->close();
        }
?>