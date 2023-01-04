<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Rejestracja</title>
  </script>
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
    @media screen and (max-width:600px) {

      .row,
      p,
      label {
        width: 100%;
      }
    }

    @media screen and (max-width:850px) {

      .row,
      p,
      label {
        width: 100%;
      }
    }

    @media screen and (max-width:1000px) {

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
      </li>
    </ol>
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
          <b>Nazwisko:</b><input type="text" name="subname" placeholder="Wpisz Nazwisko" required /><br>
        </label>
      </div>
      <div class="row">
        <label>
          <b>Adres Email:</b><input type="email" placeholder="example@gmail.com" name="adres" required /></label>
      </div>
      <?php
      // if (isset($_SESSION['logdata'])) {
      //   echo $_SESSION['logdata'];
      //   unset($_SESSION['logdata']);
      // }
      ?>
      <div class="row">
        <label><b>Numer Telefonu:</b><input type="tel" name="telefon" placeholder="Max 9 znaków" required /></label>
      </div>
      <div class="row">
        <label><b>Login:</b><input type="text" name="login" placeholder="Max 10 znaków" required /></label>
      </div>
      <div class="row">
        <label><b>Hasło:</b><input type="password" name="password" placeholder="..." required /></label>
      </div>
      <div class="row">
        <label><input type="checkbox" name="rule" required /><b> - Akceptuje regulamin</b></label>
      </div>
      <input type="submit" value="Zarejestruj" />
    </form>
    <div id="slider"></div>
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>