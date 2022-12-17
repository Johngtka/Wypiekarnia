<?php
// podłączenie dokumentu który sprawdza czy obiekt użytkownika istnieje
require_once("czyzalogowany.php");
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Twoje konto</title>
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

    h3 {
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

    @media(max-width:600px) {

      h1,
      h2,
      h3,
      a {
        width: 100%;
      }

    }

    @media(max-width:850px) {

      h1,
      h2,
      h3,
      a {
        width: 100%;
      }
    }

    @media(max-width:1000px) {

      h1,
      h2,
      h3,
      a {
        width: 100%;
      }
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
  <!--And of section-->
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
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main">
    <?php
    echo "<h1>Witaj<br>" . $zalogowany_urzytkownik['login']/*zmienna w której jest zapisana kolumna z tablicy obiektu użytkownika*/ . "</h1>";
    echo "<h2><a href='logout.php'>Wyloguj</a></h2>";
    echo "<h2><a href='http://localhost/Wypiekarnia/'>Strona Główna &#10224;</a></h2>";
    echo '<h2><a href="http://localhost/Wypiekarnia/basket.php">Zamówienia <i class="icon-basket"></i
            ></a></h2>';
    echo "<h3><a href='http://localhost/Wypiekarnia/edit.php'>Edytuj Konto</a></h3>";
    echo "<h3><a href='wyjscie.php'>Usuń Konto</a></h3>";
    ?>
    <br>
    <div id="slider"></div><br><br><br><br>
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>