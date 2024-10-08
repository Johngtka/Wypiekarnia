<?php
require_once('PDO.php');
if (!isset($_SESSION['user'])) {
  header('Location: http://localhost/Wypiekarnia/loginVerify.php');
  exit();
} else {

  if ($_POST['count'] <= 0) {
    $_SESSION['noNumber'] = '<span style="color: red"><b>*Wpisz poprawną ILOŚĆ!!!</b></span>';
    header('Location: http://localhost/Wypiekarnia/ciastka.php');
    exit();
  }

  if (!ctype_digit($_POST['phone'])) {
    $_SESSION['noPhoneCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
    header('Location: http://localhost/Wypiekarnia/ciastka.php');
    exit();
  }

  $count = 'sztuk';
  $number = filter_input(INPUT_POST, 'count');
  $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
  $comment = filter_input(INPUT_POST, 'comment');

  $discountCode = isset($_POST['discountCode']) ? filter_input(INPUT_POST, 'discountCode') : '';

  $orderData = [
    'count' => $number,
    'phone' => $phone,
    'comment' => $comment
  ];

  $prodType = @[
    'American' => $_POST['13'],
    'Caramels' => $_POST['14'],
    'Bakalie' => $_POST['15'],
    'Cantuccini' => $_POST['16']
  ];

  if (isset($prodType['American'])) {
    $prodNameSelected = 'Ciasteczka - Amerykańskie';
  }

  if (isset($prodType['Caramels'])) {
    $prodNameSelected = 'Ciasteczka - Ziarna w Karmelu';
  }

  if (isset($prodType['Bakalie'])) {
    $prodNameSelected = 'Ciasteczka - Owsiane z Bakaliami';
  }

  if (isset($prodType['Cantuccini'])) {
    $prodNameSelected = 'Ciasteczka - Cantuccini';
  }

  if (isset($prodType['American']) && isset($prodType['Caramels']) && isset($prodType['Bakalie']) && isset($prodType['Cantuccini'])) {
    header('Location: http://localhost/Wypiekarnia/control.php');
    exit();
  } else {

    $query = $db->prepare("INSERT INTO zamowienia VALUES (NULL,:name, :count, :orderDate, :orderTime, :phone, :login, :comment, :SaleCode)");

    $orderTimeStamp = [
      'orderDate' => date('Y.m.d'),
      'orderTime' => date('H:i'),
      'orderDateForUser' => date('d.m.Y')
    ];

    if ($orderData['count'] <= 1) {
      $conf = $count . "ę";
    } else {
      $conf = $count . "i";
    }

    $query->bindValue(':name', $prodNameSelected, PDO::PARAM_STR);
    $query->bindValue(':count', $orderData['count'], PDO::PARAM_INT);
    $query->bindValue(':orderDate', $orderTimeStamp['orderDate'], PDO::PARAM_STR);
    $query->bindValue(':orderTime', $orderTimeStamp['orderTime'], PDO::PARAM_STR);
    $query->bindValue(':phone', $orderData['phone'], PDO::PARAM_INT);
    $query->bindValue(':login', $_SESSION['user']['login'], PDO::PARAM_STR);
    $query->bindValue(':comment', $orderData['comment'], PDO::PARAM_STR);
    $query->bindValue(':SaleCode', $discountCode !== '' ? $discountCode : 'No Discount Code', PDO::PARAM_STR);
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

  <style type="text/css">
    .summaryPanel {
      margin: 5%;
      padding: 3%;
      margin-left: auto;
      margin-right: auto;
      display: flex;
      background-color: #fff;
      border-radius: 10%;
      border: 5px solid #000;
      flex-wrap: wrap;
    }

    .summaryContent {
      text-align: left;
      margin-left: auto;
      margin-right: auto;
    }

    @media screen and (max-width:1000px) {

      .summaryPanel {
        width: 80%;
        border-radius: 5%;
      }

    }

    @media screen and (min-width:1000px) {

      .summaryPanel {
        width: 40%;
        border-radius: 5%;
      }

    }

    /* a:hover {
      color: #fff;
    } */

    /* @media only screen and (max-width:600px) and (max-width:850px) and (max-width:1000px) {

      a {
        width: 100%;
      }

    } */
  </style>
</head>

<body>
  <div class="up">
    <div id="logo">
      <div id="a">
        <img src="img/logo1.png" title="Logo" alt="Logo" />
      </div>
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
    <div class="summaryPanel">
      <div class="summaryContent">
        <?php
        echo "<h1>Podsumowanie</h1>";
        echo "<p><b>Zamówienie z dnia: " . $orderTimeStamp['orderDateForUser'] . ' ' . $orderTimeStamp['orderTime'] . "</b></p>";
        echo "<p>Zamówiłeś " . $orderData['count'] . " " . $conf . "</p>";
        echo "<p><b> (" . $prodNameSelected . ") </b></p>";
        echo "<p>Numer Telefonu: " . $orderData['phone'] . "<p>";
        echo "<h1>Z komentarzem:</h1>";
        echo "<p> " . $orderData['comment'] . "</p>";
        echo "<p><b> *Po przetworzeniu twojego zamówienia </br> wszystke informację dostaniesz na e-mail: " . $_SESSION['user']['email'] . "</b><p>";
        ?>
      </div>
    </div>

    <div id="slider"></div>
    <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
  </div>
</body>

</html>