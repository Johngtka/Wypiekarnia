<?php
require_once('PDO.php');
if (!isset($_SESSION['user'])) {
  header('Location: czyzalogowany.php');
  exit();
} else {
  $prodtype = @['usa' => $_POST['czek'], 'kar' => $_POST['ziarna'], 'bak' => $_POST['bakaliowe'], 'can' => $_POST['cantuccini']];
  $orderdata = ['ilość' => $_POST["i"], 'data' => $_POST["data"], 'czas' => $_POST["czas"], 'email' => $_POST["adres"], 'telefon' => $_POST["telefon"], 'komentarz' => $_POST["komentarz"]];
  if (isset($prodtype['usa'])) {
    $opt = ['nazwa' => 'Ciasteczka z czekoladą (Amerykańskie)'];
    $_SESSION['op'] = $opt['nazwa'];
    // setcookie('desc', $opt['nazwa']);
  }
  if (isset($prodtype['zia'])) {
    $opt = ['nazwa' => 'Ciasteczka Ziarna w Karmelu'];
    $_SESSION['op'] = $opt['nazwa'];
    // setcookie('desc', $opt['nazwa']);
  }
  if (isset($prodtype['bak'])) {
    $opt = ['nazwa' => 'Ciasteczka owsiane z bakaliami'];
    $_SESSION['op'] = $opt['nazwa'];
    // setcookie('desc', $opt['nazwa']);
  }
  if (isset($prodtype['can'])) {
    $opt = ['nazwa' => 'Ciasteczka Cantuccini'];
    $_SESSION['op'] = $opt['nazwa'];
    // setcookie('desc', $opt['nazwa']);
  }
  if (isset($prodtype['usa']) && isset($prodtype['kar']) && isset($prodtype['bak']) && isset($prodtype['can'])) {
    header('Location: control.php');
    exit();
  } else {
    $sql = "INSERT INTO zamowienia VALUES (NULL,'$_SESSION[op]','$orderdata[ilość]','$orderdata[data]','$orderdata[czas]','$orderdata[email]','$orderdata[telefon]','$orderdata[komentarz]')";
    $query = $db->prepare($sql);
    $query->execute();
  }
}
?>
<!DOCTYPE HTML>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Podsumowanie</title>
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
    #cart {
      width: 1000px;
      height: 210px;
      background-color: #000;
      opacity: 0.5;
      color: #fff;
      display: flex;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
    }

    #cart a {
      text-decoration: none;
      color: #fff;
      width: 400px;
      margin-left: auto;
      margin-right: auto;
      display: block;
      height: 210px;
    }

    #cart a:first-child {
      padding-top: 8%;
    }

    a:hover {
      color: #fff;
    }

    @media screen and (max-width:600px) {

      #cart,
      a {
        width: 100%;
      }

    }

    @media screen and (max-width:850px) {

      #cart,
      a {
        width: 100%;
      }
    }

    @media screen and (max-width:1000px) {

      #cart,
      a {
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
            <a href="http://localhost/Wypiekarnia/konto.php"><?php echo $_SESSION['profile']; ?> <i class='fas'>&#xf406;</i></a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main">
    <?php
    echo "<h1>Podsumowanie</h1>";
    echo "<p>Zamówiłeś" . $orderdata['ilość'] . "</p>";
    echo "<b>" . $_SESSION['op'] . "</b>";
    echo "<p>Na adres" . $orderdata['email'] . "<p>";
    echo "<p>Numer Telefonu:" . $orderdata['telefon'] . "<p>";
    echo "<p>Na termin:" . $orderdata['data'] . "</p>";
    echo "<p>Godzinę:" . $orderdata['czas'] . "</p>";
    echo "<h1>Z komentarzem:</h1>";
    echo "<br> " . $orderdata['komentarz'] . "<br><br>";
    echo "<input type='button' onclick='window.print()' value='Drukuj Potwierdzenie'/>";
    ?>
    <!-- <div class="pay">
      <i class="icon-credit-card-alt"></i>
      <i class="icon-cc-visa"></i>
      <i class="icon-cc-mastercard"></i>
      <i class="icon-cc-paypal"></i>
    </div> -->
    <h1 id="cart"><a href="http://localhost/Wypiekarnia/basket.php">Do Koszyka</a></h1>
    <div id="slider"></div>
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>