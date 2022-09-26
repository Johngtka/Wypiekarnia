<!DOCTYPE HTML>
<html lang="pl-PL">
    <head>
        <meta charset="utf-8"/>
        <title>Podsumowanie</title>
        <meta name="description" content="Zamów swoje ulubione delicje" />
    <meta
      name="keywords"
      content="ciasta, torty, i, wypieki, na, każdą, okazję"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="icon" href="icon.png" sizes="32x32" type="image/png" />
    <link rel="stylesheet" href="css1/font.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="scripts.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!--Font section-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap"
      rel="stylesheet"
    />
    <!--And of section-->
    </head>
    <body>
    <div class="up">
      <div id="logo" onclick="x()">
      <div id="a" class="row col-sm-6">
        <img src="img/logo1.png" title="Logo" alt="Logo" />
        </div>
        <div id="eggs" class="row col-sm-6 invisible"></div>
      </div>
      <ol>
        <li>
          <a href="#">MENU &#9776;</a>
          <ul>
            <li>
              <a href="http://localhost/Wypiekarnia/"
                >Strona Główna<!--<i class="icon-home"></i>--> &#10224;</a>
            </li>
            <li>
              <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
            </li>
            <li>
              <a href="#">Aktualizacje &#9781;</a>
            </li>
          </ul>
        </li>
      </ol>
      <div style="clear: both;"></div>
    </div>
    <div class="main">
        <?php
          $i = $_POST["i"];
          $adres = $_POST["adres"];
          $telefon = $_POST["telefon"];
          $data = $_POST["data"];
          $czas = $_POST["czas"];
          $komentarz = $_POST["komentarz"];
          echo "<h1>Podsumowanie</h1>";
          echo "<p>Zamówiłeś $i</p>";
          if (isset($_POST['przenna'])) echo "<b>Bułek Przennych</b><br>"; 
          if (isset($_POST['kajzerka'])) echo "<b>Bułek Kajzerek</b><br>";
          if (isset($_POST['razowa']))echo "<b>Bułek Razowych</b><br>";
          if (isset($_POST['ziarnista'])) echo "<b>Bułek Ziarnistyk</b><br>";
          echo "<p>Na adres $adres<p>";
          echo "<p>Numer Telefonu: $telefon<p>";
          echo "<p>Na termin: $data</p>";
          echo "<p>Godzinę: $czas</p>";
          echo "<h1>Z komentarzem:</h1>";
          echo "<br> $komentarz<br><br>";
          echo "<input type='button' onclick='window.print()' value='Drukuj Potwierdzenie'/>";
          echo "<h1>Wybierz Metode Płatności:</h1>";
        ?>
        <div class="pay">
        <i class="icon-credit-card-alt"></i>
        <i class="icon-cc-visa"></i>
        <i class="icon-cc-mastercard"></i>
        <i class="icon-cc-paypal"></i>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
    <footer>Lorem ipsum</footer>
    <script src="js/bootstrap.min.js"></script>    
    </body>
</html>