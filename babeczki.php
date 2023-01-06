<?php
// podłączenie dokumentu który sprawdza czy obiekt użytkownika istnieje
require_once("czyzalogowany.php");
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Edycja Zamówienia</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
  <link rel="stylesheet" href="css1/font.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
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
          <li>
            <a href="http://localhost/Wypiekarnia/konto.php">Konto <i class='fas'>&#xf406;</i></a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main1">
    <form action="4.php" method="POST">
      <div class="row">
        <legend><b>Rodzaj Babeczki:</b></legend>
        <div style="margin-top:10px;">
          <label><input type="checkbox" name="biala" value="1"><b>Babeczka Czekoladowa Biała(8zł/100gr)</label></b></br>
          <label><input type="checkbox" name="czarna" value="2"><b>Babeczka Czekoladowa Czarna(8zł/100gr)</label></b></br>
          <label><input type="checkbox" name="malinowa" value="3"><b>Babeczka Malinowa(8zł/100gr)</label></b></br>
          <label><input type="checkbox" name="sezonowa" value="4"><b>Babeczka Sezonowa(8zł/100gr)</b></label>
        </div>
      </div>

      <div class="row">
        <label><b>Ilość:</b><input type="number" placeholder="..." name="i" step="1" require /></label>
      </div>

      <div class="row">
        <label><b>Adres Email:</b><input type="email" placeholder="example@gmail.com" name="adres" required /></label><br /><br />
        <label><b>Numer Telefonu:</b><input type="tel" name="telefon" required /></label>
      </div>

      <div class="row">
        <label><b>Data dostawy:</b><input type="date" name="data" require /></label><br /><br />
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
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>