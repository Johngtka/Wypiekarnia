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
      width: 100%;
      display: flex;
      justify-content: center;
      margin-top: 25px;
      margin-bottom: 25px;
    }

    button[type="submit"],
    .backLink {
      align-items: center;
      padding: 10px;
      border-radius: 10px;
      font-weight: bold;
      border: 2px #000 solid;
      margin: 5px;
    }

    .backLink a {
      color: #000;
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
    <h1>Rejestracja:</h1>
    <form action="register.php" method="POST">
      <div class="row">
        <label>
          <b>Imie:</b><input type="text" name="name" placeholder="Wpisz Imie" required />
        </label>
      </div>
      <div class="row">
        <label>
          <b>Nazwisko:</b><input type="text" name="surname" placeholder="Wpisz Nazwisko" required /><br>
        </label>
      </div>
      <div class="row">
        <label>
          <b>Adres Email:</b><input type="email" name="location" placeholder="example@gmail.com" required /></label>
      </div>
      <div class="row">
        <label><b>Numer Telefonu:</b><input type="tel" name="phone" placeholder="111-222-333" required /></label>
        <?php
        if (isset($_SESSION['noNumberCorrect'])) {
          echo $_SESSION['noNumberCorrect'];
          unset($_SESSION['noNumberCorrect']);
        }
        ?>
      </div>
      <div class="row">
        <label><b>Login:</b><input type="text" name="login" placeholder="Max 10 znaków" required /></label>
      </div>
      <?php
      if (isset($_SESSION['errchx'])) {
        echo $_SESSION['errchx'];
        unset($_SESSION['errchx']);
      }
      ?>
      <div class="row">
        <label><b>Hasło:</b><input type="password" name="password" placeholder="..." required /></label>
      </div>
      <div class="row">
        <label><input type="checkbox" name="rule" required /><b> - Akceptuje regulamin</b></label>
      </div>
      <div class="formButtons">
        <a href="http://localhost/Wypiekarnia/loginForm.php"><button type="button" class="backLink">Powrót <i class="icon-undo"></i></button></a>
        <button type="submit">Zarejestruj <i class="icon-export"></i></button>
      </div>
    </form>
  </div>
  <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
</body>

</html>