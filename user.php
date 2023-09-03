<?php
// podłączenie dokumentu który sprawdza czy obiekt użytkownika istnieje
require_once('czyzalogowany.php');
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Twoje konto</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./logo.png" sizes="64x64" type="image/png" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css1/fontello.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script src="js/bootstrap.min.js"></script>
  <script src="jquery-3.7.0.min.js"></script>
  <script src="scripts.js"></script>
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
    .panel {
      width: 100%;
      height: 120px;
      background-color: #000000;
      opacity: 0.5;
      text-align: center;
      font-size: 40px;
      color: #fff;
      margin-left: auto;
      margin-right: auto;
      padding-top: 30px;
      padding-bottom: 30px;
    }

    .main a {
      text-decoration: none;
      color: #fff;
      /* display: block; */
      /* vertical-align: middle; */
      margin-left: auto;
      margin-right: auto;
    }

    a:hover {
      color: #fff;
    }

    @media only screen and (max-width:600px)and (max-width:850px) and (max-width:1000px) {

      h1,
      a {
        padding: 0;
        width: 100%;
      }

    }
  </style>
  <!--And of section-->
</head>

<body>
  <div class="up">
    <div id="logo" onclick="showTimerWithDate()">
      <div id="a">
        <img src="img/logo1.png" title="Logo" alt="Logo" />
      </div>
      <div id="eggs" class="invisible"></div>
    </div>
    <ul>
          <li>
              <a href="http://localhost/Wypiekarnia/updates.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
          </li>
          <li>
              <a href="http://localhost/Wypiekarnia/contact.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
    </ul>
  </div>
  <div class="main">
    <?php
    echo "<div class='panel'><i class='icon-user-circle'></i> " . $zalogowany_urzytkownik['login'] . "</div>";
    echo "<div class='panel'><a href='http://localhost/Wypiekarnia/'><i class='icon-home'></i> Strona Główna</a></div>";
    echo "<div class='panel'><a href='http://localhost/Wypiekarnia/edit.php'><i class='icon-pencil'></i> Edytuj Konto</a></div>";
    echo "<div class='panel'><a href='http://localhost/Wypiekarnia/exit.php'><i class='icon-trash'></i> Usuń Konto</a></div>";
    echo "<div class='panel'><a href='http://localhost/Wypiekarnia/logout.php'><i class='icon-logout'></i> Wyloguj</a></div>";
    // echo "<div class='panel'><a href='http://localhost/Wypiekarnia/basket.php'><i class='icon-basket'></i
    // > Koszyk" . "(" . @$_SESSION['orders'] . ")" . "</a></div>";
    ?>
    <!-- <div id="slider"></div> -->
    
  </div>
  <footer>Lorem ipsum</footer>
</body>

</html>