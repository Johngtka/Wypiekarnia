<!--przekierowanie do profilu jeśli jest zalogowany użytkownik(zabezpieczenie przed wejściem do profilu użytkownika bez logowania-->
<?php
session_start();
if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == true) {
  header('Location: user.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Logowanie</title>
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
    .row {
      width: 100%;
    }
  </style>
</head>

<body onload="zmienslajd()">
  <div class="up">
    <div id="logo" onclick="x()">
      <div id="a" class="row col-sm-6">
        <img src="img/logo1.png" title="Logo" alt="Logo" />
      </div>
      <div id="eggs" class="row col-sm-6 invisible"></div>
    </div>
    <ol>
      <li>
        <a href="#">MENU &#9776;</a>
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
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
          </li>
        </ul>
      </li>
    </ol>
    <div style="clear: both"></div>
  </div>
  <div class="main">
    <h1>Logowanie:</h1>
    <form action="login.php" method="POST">
      <div class="row">
        <label>
          <b>Login:</b><input type="text" name="login" placeholder="Wpisz Login" required />
        </label>
      </div>
      <div class="row">
        <label>
          <b>Hasło:</b><input type="password" name="password" placeholder="Wpisz Hasło" required />
        </label>
        <?php
        //Wyświetlenie info o niepoprawnym logowaniu
        if (isset($_SESSION['err'])) {
          echo $_SESSION['err'];
        }
        ?>
      </div>
      <input type="submit" value="Zaloguj" /><br><br>
    </form>
    <form action="rejestracja.php" method="POST"><input type="submit" value="Zarejestruj"></form>
    <div id="slider"></div>
  </div>
  <footer>Lorem ipsum</footer>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>