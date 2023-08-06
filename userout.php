<?php
require_once('PDO.php');
if (!isset($_POST['login']) || !isset($_POST['haslo'])) {
  header('Location: wyjscie.php');
  exit();
} else {
  $log = $_POST['login'];
  $pass = $_POST['haslo'];
  $query = $db->prepare("DELETE FROM klijeci WHERE logi='{$log}' AND haslo='{$pass}'");
  $query->execute();
  $aireset = $db->prepare("ALTER TABLE klijeci AUTO_INCREMENT=1");
  $aireset->execute();
  unset($_SESSION['user']);
}
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Do widzenia</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css1/fontello.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script src="scripts.js"></script>
  <script src="jquery-3.7.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
    a {
      text-decoration: none;
      color: #000;
      width: 400px;
      height: 110px;
    }

    a:hover {
      color: #000;
    }
  </style>
</head>

<body>
  <div class="up">
    <div id="logo" onclick="x()">
      <div id="a">
        <img src="img/logo1.png" title="Logo" alt="Logo" />
      </div>
      <div id="eggs" class="invisible"></div>
    </div>
    <ul>
          <li>
            <a href="http://localhost/Wypiekarnia/">Strona Główna
              <i class="icon-home"></i>
            </a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
    </ul>
  </div>
  <div class="main">
    <h1>Już nas opuszczasz?</h1>
    <p>------------------------------------</p>
    <h6>
      <p>Szkoda ale spokojnie nie gniewamy się.<br>Możesz do nas wrócić w każdej chwili.<br> A teraz, jak to mówił Ogórek z filmu Auta: <br><b>"<i>Leć, stasieniek, leć i odleć</i>"</b></p>
    </h6>
    <h2><a href='http://localhost/Wypiekarnia/'>Strona Główna <i class="icon-home"></i></a></h2>
    <div id="slider"></div>
    <footer>Lorem ipsum</footer>
  </div>
</body>

</html>