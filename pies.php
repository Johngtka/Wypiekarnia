<?php
// podłączenie dokumentu który sprawdza czy jest zalogowanu user
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
  <link rel="stylesheet" href="./discountCodeStyleBlock.css">
  <script src="js/bootstrap.min.js"></script>
  <script src="jquery-3.7.0.min.js"></script>
  <script src="./discountCodeFunctions.js"></script>
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
      <li>
        <a href="http://localhost/Wypiekarnia/loginForm.php"><?php echo $_SESSION['user']['login']; ?><i class="icon-user-circle"></i></a>
      </li>
    </ul>
  </div>
  <div class="main1">
    <form action="2.php" method="POST">
      <div class="row">
        <legend><b>Rodzaj Ciasta:</b></legend>
        <div style="margin-top:10px;">
          <label><input type="checkbox" name="drozdzowe"><b>Drożdżowe(15zł/Kg)</b></label></br>
          <label><input type="checkbox" name="sernik"><b>Sernik(20zł/Kg)</b></label></br>
          <label><input type="checkbox" name="brown"><b>Brown'e(25zł/Kg)</b></label></br>
          <label><input type="checkbox" name="dziec"><b>Dziecięce(30zł/Kg)</b></label>
        </div>
      </div>

      <div class="row">
        <label><b>Ilość:</b><input type="number" placeholder="..." step="1" name="count" required /></label>
        <?php
        if (isset($_SESSION['noNumber'])) {
          echo $_SESSION['noNumber'];
          unset($_SESSION['noNumber']);
        }
        ?>
      </div>

      <div class="row">
        <label><b>Numer Telefonu:</b><input type="tel" placeholder="111222333" name="phone" required /></label>
        <?php
        if (isset($_SESSION['noPhoneCorrect'])) {
          echo $_SESSION['noPhoneCorrect'];
          unset($_SESSION['noPhoneCorrect']);
        }
        ?>
      </div>

      <div class="row">
        <div><label><b>Uwagi do zamówienia:</b></label></div>
        <textarea id="komentarz" rows="5" cols="80" placeholder="Dodatkowe Informacje" name="comment" required></textarea>
      </div>

      <div class="row discountCodeInputBlock">
        <label><input type="checkbox" onclick="showDiscountCodeInput()"> - <b>Posiadam kod rabatowy?</b></label>
        <input class="discountCodeInput" name="discountCode" type="search" name="discountCode" disabled>
      </div>

      <div class="formButtons">
        <button type="submit">Zamów<i class="icon-export"></i></button>
        <button type="reset">Wyczyść<i class="icon-cancel-circled-outline"></i></button>
      </div>
    </form>
  </div>
  <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
</body>

</html>