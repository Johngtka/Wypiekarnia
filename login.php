<?php
      session_start();
        require_once "dbconnect.php";
        $conn = @new mysqli($host, $user, $password, $database);
        if ($conn->connect_errno!=0){
          echo "Error:".$conn->connect_errno;
        }
        else{
          $login = $_POST['login'];
          $haslo = $_POST['password'];
          $sql = "SELECT * FROM klijęci WHERE logi='$login' AND haslo='$haslo'";
          if ($result = @$conn->query($sql)){
            $ilosc = $result->num_rows;
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
                 $_SESSION['err'] = '<span style="color: red"><b>*Nieprawidłowy login lub hasło</b></span>';  
                 header('Location: konto.php');
            }
          }
          $conn->close();
        }
?>