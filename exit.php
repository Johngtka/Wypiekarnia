<?php
require_once('loginVerify.php');
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Kasowanie Konta</title>
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
    h1 {
      text-shadow: none;
      text-decoration: underline;
      text-decoration-style: dashed;
    }

    .formButtons {
      display: flex;
      justify-content: center;
      margin-top: 25px;
      margin-bottom: 25px;
    }

    button[type='submit'] {
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
    <br>
    <h1>Tutaj Morzesz</h1>
    <h1>Usunąć Swoje Konto</h1>
    <form action="userout.php" method="POST">
      <div class="row">
        <label>
          <b>Login:</b><input type="text" name="login" placeholder="Wpisz Login" required />
        </label>
      </div>
      <div class="row">
        <label>
          <b>Hasło:</b><input type="password" name="haslo" placeholder="Wpisz hasło" required />
        </label>
      </div>
      <div class="row">
        <label><input type="checkbox" required><b> - Akceptuje Decyzje</b></label></br>
      </div>
      <div class="formButtons">
        <button type="submit">Usuń Profil<i class="icon-export"></i></button>
      </div>
    </form>
    <div id="slider"></div>
    <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
  </div>
</body>

</html>