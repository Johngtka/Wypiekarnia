<?php
require_once('PDO.php');
if (!isset($_SESSION['user'])) {
  header('Location: http://localhost/Wypiekarnia/loginVerify.php');
  exit();
} else {

  if($_POST['i'] <= 0){
  
    $_SESSION['noNumber'] = '<span style="color: red"><b>*Wpisz poprawną ILOŚĆ!!!</b></span>';
    header('Location: http://localhost/Wypiekarnia/tarty.php');
    exit();

  }

  if(!ctype_digit($_POST['telefon'])){

    $_SESSION['noPhoneCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
    header('Location: http://localhost/Wypiekarnia/tarty.php');
    exit();

  }

  $count = 'sztuk';
  $number = filter_input(INPUT_POST, 'i');
  $mail = filter_input(INPUT_POST, 'adres', FILTER_VALIDATE_EMAIL);
  $phone = filter_input(INPUT_POST, 'telefon', FILTER_VALIDATE_INT);
  $comment = filter_input(INPUT_POST, 'komentarz');

  $orderData = [
    'ilość' => $number,
    'data' => $_POST["data"],
    'czas' => $_POST["czas"],
    'email' => $mail,
    'telefon' => $phone,
    'komentarz' => $comment
  ];

  $prodType = @[
    'jab' => $_POST['jablkowe'],
    'wio' => $_POST['wiosenne'],
    'co' => $_POST['czekorz'],
    'mali' => $_POST['malinowe']
  ];

  if (isset($prodType['jab'])) {
    $opt = 'Jabłkowa na mlecznym kremie';
  }

  if (isset($prodType['wio'])) {
    $opt = 'Wiosenna';
  }

  if (isset($prodType['co'])) {
    $opt = 'Czekoladowo-orzechowa';
  }

  if (isset($prodType['mali'])) {
    $opt = 'Malinowa';
  }

  if (isset($prodType['jab']) && isset($prodType['wio']) && isset($prodType['co']) && isset($prodType['mali'])) {
    header('Location: http://localhost/Wypiekarnia/control.php');
    exit();
  } else {

    $query = $db->prepare("INSERT INTO zamowienia VALUES (NULL,:nazwa,:ilosc,:dat,:czas,:mail,:telefon,:kom)");

    if ($orderData['ilość'] <= 1) {
      $conf = $count . "ę";
      $num = 'Tartę ' . $opt;
    } else {
      $conf = $count . "i";
      $num = 'Tarty ' . $opt;
    }

    $query->bindValue(':nazwa', $num, PDO::PARAM_STR);
    $query->bindValue(':ilosc', $orderData['ilość'], PDO::PARAM_INT);
    $query->bindValue(':dat', $orderData['data'], PDO::PARAM_STR);
    $query->bindValue(':czas', $orderData['czas'], PDO::PARAM_STR);
    $query->bindValue(':mail', $orderData['email'], PDO::PARAM_STR);
    $query->bindValue(':telefon', $orderData['telefon'], PDO::PARAM_INT);
    $query->bindValue(':kom', $orderData['komentarz'], PDO::PARAM_STR);
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
  <link rel="icon" href="./logo.png" sizes="64x64" type="image/png" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="stylesheet" href="css1/fontello.css" type="text/css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
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
    /* #cart {
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
    } */

    a:hover {
      color: #fff;
    }

    @media only screen and (max-width:600px) and (max-width:850px) and (max-width:1000px) {

      a {
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
  <div class="main">
    <?php
    echo "<h1>Podsumowanie</h1>";
    echo "<p>Zamówiłeś " . $orderData['ilość'] . " " . $conf . "</p>";
    echo "<p><b> (" . $num . ") </b></p>";
    echo "<p>Na adres: " . $orderData['email'] . "<p>";
    echo "<p>Numer Telefonu: " . $orderData['telefon'] . "<p>";
    echo "<p>Na termin: " . $orderData['data'] . "</p>";
    echo "<p>Godzinę: " . $orderData['czas'] . "</p>";
    echo "<h1>Z komentarzem:</h1>";
    echo "<br> " . $orderData['komentarz'] . "<br><br>";
    echo "<input type='button' onclick='window.print()' value='Drukuj Potwierdzenie'/>";
    ?>
    <!-- <div class="pay">
      <i class="icon-credit-card-alt"></i>
      <i class="icon-cc-visa"></i>
      <i class="icon-cc-mastercard"></i>
      <i class="icon-cc-paypal"></i>
    </div> -->
    <!-- <h1 id="cart"><a href="http://localhost/Wypiekarnia/basket.php">Do Koszyka</a></h1> -->
    <div id="slider"></div>
  </div>
  <footer>Lorem ipsum</footer>
</body>

</html>