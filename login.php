<?php
      session_start();
      /*if(!isset($_POST['login']) || !isset($_POST['haslo'])){
        header('Location: konto.php');
        exit();
      }*/
        require_once "dbconnect.php";
        $conn = @new mysqli($host, $user, $password, $database);
        if ($conn->connect_errno!=0){
          echo "Error:".$conn->connect_errno;
        }
        else{
          $login = $_POST['login'];
          $haslo = $_POST['password'];
          $login = htmlentities($login,ENT_QUOTES,"UTF-8");
          $haslo = htmlentities($haslo,ENT_QUOTES,"UTF-8");
          if ($result = @$conn->query(
            sprintf("SELECT * FROM klijęci WHERE logi='%s' AND haslo='%s'", 
            mysqli_real_escape_string($conn,$login), 
            mysqli_real_escape_string($conn,$haslo))))
            {
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