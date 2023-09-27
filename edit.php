<?php
// podłączenie dokumentu który sprawdza czy jest zalogowanu user
require_once('loginVerify.php');
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Edycja Konta</title>
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
    .formButtons {
      display: flex;
      justify-content: center;
      margin-top: 25px;
      margin-bottom: 25px;
    }

    button[type='submit'],
    button[type='reset'] {
      padding: 10px;
      border-radius: 10px;
      font-weight: bold;
      border: 2px #000 solid;
      margin: 5px;
    }

    @media only screen and (max-width:600px) and (max-width:850px) and (max-width:1000px) {

      .row,
      p,
      label {
        width: 100%;
      }

    }
  </style>
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
        <a href="http://localhost/Wypiekarnia/">Strona Główna <i class="icon-home"></i></a>
      </li>
      <li>
        <a href="http://localhost/Wypiekarnia/updates.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
      </li>
      <li>
        <a href="http://localhost/Wypiekarnia/contact.php">Kontakt<i class="icon-phone-squared"></i></a>
      </li>
    </ul>
  </div>
  <div class="main">
    <form action="edited.php" method="POST">
      <h1>Tutaj jest edycja konta:</h1>
      <p><b>Tutaj wpisz dane które koniecznie chcesz zmienić</b></p>
      <div class="row">
        <label>
          <p><b>Zmień Login:</b></p><input type="text" name="login" placeholder="Max 10 znaków" required>
        </label>
      </div>
      <div class="row">
        <label>
          <p><b>Zmień Hasło:</b></p><input type="password" name="password" placeholder="..." required>
        </label>
      </div>
      <div class="row">
        <label>
          <p><b>Zmień e-mail:</b></p><input type="text" name="mail" placeholder="example@gmail.com" required>
        </label>
      </div>
      <div class="row">
        <label>
          <p><b>Zmień Numer Telefonu:</b></p><input type="tel" name="telefon" placeholder="Max 9 Znaków" required>
        </label>
        <?php
        if (isset($_SESSION['noNumberCorrect'])) {
          echo $_SESSION['noNumberCorrect'];
          unset($_SESSION['noNumberCorrect']);
        }
        ?>
      </div>
      <div class="formButtons">
        <button type="reset">Wyczyść<i class="icon-cancel-circled-outline"></i></button>
        <button type="submit">Zmień<i class="icon-export"></i></button>
      </div>
    </form><br>
    <div id="slider"></div>
    <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
  </div>
</body>

</html>