<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Rejestracja</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css1/font.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
  <script src="scripts.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <!--sekcja czcionek-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap" rel="stylesheet" />
  <!--koniec sekcji czcionek-->
  <style type="text/css">
    h1 {
      width: 1000px;
      height: 110px;
      background-color: #000000;
      opacity: 0.5;
      color: #ffffff;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
    }

    h2 {
      width: 1000px;
      height: 110px;
      background-color: #000000;
      opacity: 0.5;
      color: #ffffff;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
      padding-top: 25px;
    }

    a {
      text-decoration: none;
      color: #ffffff;
      width: 400px;
      height: 110px;
    }

    a:hover {
      color: #ffffff;
    }
  </style>
</head>

<body onload="zmienslajd()">
  <div class="up">
    <div id="logo" onclick="x()">
      <div id="a">
        <img src="img/logo1.png" title="Logo" alt="Logo" />
      </div>
      <div id="eggs" class="invisible"></div>
    </div>
    <ol>
      <li>
        <a href="#">
          <span id="menu-text">MENU</span> &#9776;
        </a>
        <ul>
          <li>
            <a href="http://localhost/Wypiekarnia/">Strona Główna
              <!--<i class="icon-home"></i>--> &#10224;
            </a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781;</a>
          </li>
        </ul>
      </li>
    </ol>
    <!-- <div style="clear: both"></div> -->
  </div>
  <div class="main">
    <?php
    session_start();
    require_once "dbconnect.php";
    $conn = @new mysqli($host, $user, $password, $database);
    if ($conn->connect_errno != 0) {
      echo "Error:" . $conn->connect_errno;
    } else {
      $imie = $_POST['name'];
      $nazwisko = $_POST['subname'];
      $mail = $_POST['adres'];
      $num = $_POST['telefon'];
      $username = $_POST['login'];
      $haslo = $_POST['password'];
      $sql = "INSERT INTO klijeci(id, imie, nazwisko, mail, telefon, logi, haslo) VALUES (NULL,'$imie','$nazwisko','$mail','$num','$username','$haslo')";
      $result = @$conn->query($sql);
      echo "<h1>Witaj<br> $username</h1>";
      echo "<h2><a href='http://localhost/Wypiekarnia/konto.php'>Strona Logowania</a></h2>";
      $conn->close();
      $result->free();
    }
    ?>
    <br>
    <div id="slider"></div><br><br><br><br>
  </div>
  <footer>Lorem ipsum</footer>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>