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
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      background-color: #000;
      opacity: 0.5;
      color: #fff;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
      padding-top: 25px;
    }

    h3 {
      width: 1000px;
      height: 110px;
      background-color: #000;
      opacity: 0.5;
      color: #fff;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
      padding-top: 25px;
    }

    @media screen and (max-width:600px) {

      h1,
      h2,
      h3,
      a {
        width: 100%;
      }

    }

    @media screen and (max-width:850px) {

      h1,
      h2,
      h3,
      a {
        width: 100%;
      }
    }

    @media screen and (max-width:1000px) {

      h1,
      h2,
      h3,
      a {
        width: 100%;
      }
    }

    a {
      text-decoration: none;
      color: #fff;
      width: 400px;
      height: 110px;
    }

    a:hover {
      color: #fff;
    }
  </style>
  <!--And of section-->
</head>

<body>
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
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main">
    <?php
    echo "<h1>Witaj<br>" . $zalogowany_urzytkownik['login']/*zmienna w której jest zapisana kolumna z tablicy obiektu użytkownika*/ . "</h1>";
    echo "<h2><a href='logout.php'><i class='fa'>&#xf08b;</i> Wyloguj</a></h2>";
    echo "<h2><a href='http://localhost/Wypiekarnia/'><i class='icon-home'></i> Strona Główna</a></h2>";
    echo "<h2><a href='http://localhost/Wypiekarnia/basket.php'><i class='icon-basket'></i
    > Koszyk" . "(" . @$_SESSION['orders'] . ")" . "</a></h2>";
    echo "<h3><a href='http://localhost/Wypiekarnia/edit.php'>&#9998; Edytuj Konto</a></h3>";
    echo "<h3><a href='wyjscie.php'>&#128465; Usuń Konto</a></h3>";
    ?>
    <br>
    <div id="slider">
    </div><br><br><br><br>
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>