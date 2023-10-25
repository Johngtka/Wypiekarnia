<?php
require_once('PDO.php');
if (!isset($_SESSION['user'])) {
  header('Location: http://localhost/Wypiekarnia/loginVerify.php');
  exit();
} else {

  if ($_POST['count'] <= 0) {
    $_SESSION['noNumber'] = '<span style="color: red"><b>*Wpisz poprawną ILOŚĆ!!!</b></span>';
    header('Location: http://localhost/Wypiekarnia/ciasta.php');
    exit();
  }

  if (!ctype_digit($_POST['phone'])) {
    $_SESSION['noPhoneCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
    header('Location: http://localhost/Wypiekarnia/ciasta.php');
    exit();
  }

  $count = 'sztuk';
  $number = filter_input(INPUT_POST, 'count');
  $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
  $comment = filter_input(INPUT_POST, 'comment');

  $orderData = [
    'count' => $number,
    'date' => $_POST["date"],
    'time' => $_POST["time"],
    'phone' => $phone,
    'comment' => $comment
  ];

  $prodType = @[
    'dr' => $_POST['drozdzowe'],
    'ser' => $_POST['sernik'],
    'bro' => $_POST['brown'],
    'kid' => $_POST['dziec']
  ];

  if (isset($prodType['dr'])) {
    $prodName = 'Ciasto Drożdżowe';
  }

  if (isset($prodType['ser'])) {
    $prodName = 'Ciasto Sernik';
  }

  if (isset($prodType['bro'])) {
    $prodName = 'Ciasto Browne';
  }

  if (isset($prodType['kid'])) {
    $prodName = 'Ciasto Dziecięce';
  }

  if (isset($prodType['dr']) && isset($prodType['ser']) && isset($prodType['bro']) && isset($prodType['kid'])) {
    header('Location: http://localhost/Wypiekarnia/control.php');
    exit();
  } else {

    $query = $db->prepare("INSERT INTO zamowienia VALUES (NULL,:nazwa,:ilosc,:dat,:czas,:telefon,:kom)");

    if ($orderData['count'] <= 1) {
      $conf = $count . "ę";
    } else {
      $conf = $count . "i";
    }

    $query->bindValue(':nazwa', $prodName, PDO::PARAM_STR);
    $query->bindValue(':ilosc', $orderData['count'], PDO::PARAM_INT);
    $query->bindValue(':dat', $orderData['date'], PDO::PARAM_STR);
    $query->bindValue(':czas', $orderData['time'], PDO::PARAM_STR);
    $query->bindValue(':telefon', $orderData['phone'], PDO::PARAM_INT);
    $query->bindValue(':kom', $orderData['comment'], PDO::PARAM_STR);
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
        <a href="http://localhost/Wypiekarnia/loginForm.php"><?php echo $_SESSION['user']['login']; ?><i class="icon-user-circle"></i></a>
      </li>
    </ul>
  </div>
  <div class="main">
    <?php
    echo "<h1>Podsumowanie</h1>";
    echo "<p>Zamówiłeś " . $orderData['count'] . " " . $conf . "</p>";
    echo "<p><b> (" . $prodName . ") </b></p>";
    echo "<p>Na e-mail: " . $_SESSION['user']['email'] . "<p>";
    echo "<p>Numer Telefonu: " . $orderData['phone'] . "<p>";
    echo "<p>Na termin: " . $orderData['date'] . "</p>";
    echo "<p>Godzinę: " . $orderData['time'] . "</p>";
    echo "<h1>Z komentarzem:</h1>";
    echo "<br> " . $orderData['comment'] . "<br><br>";
    ?>
    <!-- <div class="pay">
      <i class="icon-credit-card-alt"></i>
      <i class="icon-cc-visa"></i>
      <i class="icon-cc-mastercard"></i>
      <i class="icon-cc-paypal"></i>
    </div> -->
    <!-- <h1 id="cart"><a href="http://localhost/Wypiekarnia/basket.php">Do Koszyka</a></h1> -->
    <div id="slider"></div>
    <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
  </div>

</body>

</html>