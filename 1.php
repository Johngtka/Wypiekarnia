<?php
// podłączenie silnika umożliwiającego łącze z bazą
require_once('PDO.php');

// sprawdzenie czy użytkownik jest zalogowany jeśli tak to else
if (!isset($_SESSION['user'])) {
  header('Location: http://localhost/Wypiekarnia/loginVerify.php');
  exit();
} else {

  if ($_POST['count'] <= 0) {
    $_SESSION['noNumber'] = '<span style="color: red"><b>*Wpisz poprawną ILOŚĆ!!!</b></span>';
    header('Location: http://localhost/Wypiekarnia/cake.php');
    exit();
  }

  // walidacja polegająca na sprawdzeniu czy wartość POST z inputa | telefon | nie posiada nic innego jak tylko liczby

  if (!ctype_digit($_POST['phone'])) {
    $_SESSION['noPhoneCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
    header('Location: http://localhost/Wypiekarnia/cake.php');
    exit();
  }

  /* 
    Przepuszczenie wartości POST przez filtrację:

    - ilość
    - adres
    - telefon
    - komentarz

    FILTER_VALIDATE_EMAIL/_INT powodują że do bazy nie przejdzie nic innego jak tylko poprawny email lub liczba

    zmienna [ count ] służy do konfiguracji odmiany ilości produktów w podsumowaniu
  */
  $count = 'sztuk';
  $number = filter_input(INPUT_POST, 'count');
  $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
  $comment = filter_input(INPUT_POST, 'comment');

  /*
    tworzenie tablicy skojażeniowej z przefiltrowanymi u góry danymi oraz dodatkowymi:

    - data
    - czas

    te 2 dane są pobrane bezpośrednio z POST 
    bo nie ma potrzeby filtrowania wartości na które użytkownik nie ma wpływu
  */

  $orderData = [
    'count' => $number,
    'phone' => $phone,
    'comment' => $comment
  ];

  /** 
   * Utworzenie wyciszonej tablicy asocjacyjnej, służącej do obsługi zamawiania jednego produktu.
   * 
   * if ( [wartości z tablicy] === [ e1=true, e2=false, e3=false, e4=false ] ) {
   *   
   *   to wtedy produkt wyśle się do bazy
   * 
   * } else if( [warości z tablicy] === true ) {
   * 
   *    wtedy będzie error
   *  
   * } else {
   *    w przeciwnym wypadku
   * 
   *    if( [wartości z tablicy] > 1 && === true ) {
   *      
   *    to wtedy do bazy wyśle się ostatni zaznaczony produkt i zostanie wygenerowana konfiguracja podsumowania zamówienia
   *    do tego produktu
   * 
   *    }     
   * }
   */

  $prodType = @[
    'ur' => $_POST['urodzinowy'],
    'sm' => $_POST['smakosz'],
    'jub' => $_POST['jubileuszowy'],
    'slub' => $_POST['slubny']
  ];

  /**
   * bloki warunkowe ustawiające zmienną na odpowiedną warość 
   * w przypadku wystąpienia jednej wartości z tablicy $prodType === true 
   * co oznacza zaznaczony odpowiedni checkbox z produktem
   */

  if (isset($prodType['ur'])) {
    $prodNameSelected = 'Tort Urodzinowy';
  }

  if (isset($prodType['sm'])) {
    $prodNameSelected = 'Tort dla Smakoszy';
  }

  if (isset($prodType['jub'])) {
    $prodNameSelected = 'Tort Jubileusz';
  }

  if (isset($prodType['slub'])) {
    $prodNameSelected = 'Tort Ślubny';
  }

  if (isset($prodType['ur']) && isset($prodType['sm']) && isset($prodType['jub']) && isset($prodType['slub'])) {
    header('Location: http://localhost/Wypiekarnia/control.php');
    exit();
  } else {
    // przygotowanie polecenia SQL wraz z bindami poniżej
    $query = $db->prepare("INSERT INTO zamowienia VALUES (NULL,:name, :count, :orderDate, :orderTime, :phone, :login, :comment)");

    /**
     * zwykła konfigurazja podsumowania jeśli ilość będzie <=1 to przypisze się sklejka tort + nazwa wybranego tortu (bez modyfikacji)
     * oraz gdy będzie coś innego (w else) to zapisze się sklejka tortów + nazwa tortu
     */

    $orderTimeStamp = [
      'orderDate' => date('Y.m.d'),
      'orderTime' => date('H:i'),
      'orderDateforUser' => date('d.m.Y')
    ];

    if ($orderData['count'] <= 1) {
      $conf = $count . "ę";
    } else {
      $conf = $count . "i";
    }

    // ustawienie bindów używanych w poleceniu SQL
    $query->bindValue(':name', $prodNameSelected, PDO::PARAM_STR);
    $query->bindValue(':count', $orderData['count'], PDO::PARAM_INT);
    $query->bindValue(':orderDate', $orderTimeStamp['orderDate'], PDO::PARAM_STR);
    $query->bindValue(':orderTime', $orderTimeStamp['orderTime'], PDO::PARAM_STR);
    $query->bindValue(':phone', $orderData['phone'], PDO::PARAM_INT);
    $query->bindValue(':login', $_SESSION['user']['login'], PDO::PARAM_STR);
    $query->bindValue(':comment', $orderData['comment'], PDO::PARAM_STR);
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
    <div class="summaryPanel">
      <div class="summaryContent">
        <?php
        echo "<h1>Podsumowanie</h1>";
        echo "<p ><b>Zamówienie z dnia: " . $orderTimeStamp['orderDateforUser'] . ' ' . $orderTimeStamp['orderTime'] . "</b></p>";
        echo "<p>Zamówiłeś " . $orderData['count'] . " " . $conf . "</p>";
        echo "<p><b> (" . $prodNameSelected . ") </b></p>";
        echo "<p>Numer Telefonu: " . $orderData['phone'] . "<p>";
        echo "<h1>Z komentarzem:</h1>";
        echo "<p> " . $orderData['comment'] . "</p>";
        echo "<p><b> *Po przetworzeniu twojego zamówienia </br> wszystke informację dostaniesz na e-mail: " . $_SESSION['user']['email'] . "</b><p>";
        ?>
      </div>
    </div>

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