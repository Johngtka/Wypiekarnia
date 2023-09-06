<?php
// podłączenie dokumentu który sprawdza czy obiekt użytkownika istnieje
require_once('loginVerify.php');
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Edycja Zamówienia</title>
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
          <li>
              <a href="http://localhost/Wypiekarnia/loginForm.php"><?php echo $_SESSION['profile']; ?><i class="icon-user-circle"></i></a>
          </li>
    </ul>
  </div>
  <div class="main1">
    <form action="3.php" method="POST">
      <div class="row">
        <legend><b>Rodzaj Tarty:</b></legend>
        <div style="margin-top:10px;">
          <label><input type="checkbox" name="jablkowe"><b>Jabłkowa na mlecznym kremie(35zł/Kg)</b></label></br>
          <label><input type="checkbox" name="wiosenne"><b>Wiosenna(30zł/Kg)</b></label></br>
          <label><input type="checkbox" name="czekorz"><b>Czekoladowo-Orzechowa(25zł/Kg)</b></label></br>
          <label><input type="checkbox" name="malinowe"><b>Malinowa(20zł/Kg)</b></label>
        </div>
      </div>
      <div class="row">
        <label><b>Ilość:</b><input type="number" placeholder="..." name="i" step="1" required /></label>
        <?php
          if(isset($_SESSION['noNumber'])){
            echo $_SESSION['noNumber'];
            unset($_SESSION['noNumber']);
          }
        ?>
      </div>

      <div class="row">
        <label><b>Adres Email:</b><input type="email" placeholder="example@gmail.com" name="adres" required /></label><br /><br />
        <label><b>Numer Telefonu:</b><input type="tel" name="telefon" placeholder="111222333" required /></label>
        <?php
          if(isset($_SESSION['noPhoneCorrect'])){
            echo $_SESSION['noPhoneCorrect'];
            unset($_SESSION['noPhoneCorrect']);
          }
        ?>
      </div>

      <div class="row">
        <label><b>Data dostawy:</b><input type="date" name="data" required /></label><br /><br />
        <label><b>Czas dostawy:</b><input type="time" name="czas" min="10:00" max="23:00" required /></label>
      </div>

      <div class="row">
        <div><label><b>Uwagi do zamówienia:</b></label></div>
        <textarea name="komentarz" id="komentarz" rows="5" cols="80" placeholder="Dodatkowe Informacje" required></textarea>
      </div>
      <div class="row">
        <input type="submit" value="Zamów!" />
      </div>
      <div class="row">
        <input type="reset" value="Wyczyść" />
      </div>
    </form>
  </div>
  <footer>Lorem ipsum</footer>
</body>

</html>