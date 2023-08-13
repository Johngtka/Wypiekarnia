<?php
// podłączenie połączenia z bazą
require_once('PDO.php');
// sprawdzenie czy nie jest zalogowany user
if (!isset($_SESSION['user'])) {
  header('Location: czyzalogowany.php');
  exit();
} else {
  // walidacja polegająca na sprawdzeniu czy wartość z formulaża nie posiada kombinacji liczb z literami
  if(!ctype_digit($_POST['telefon'])){
    $_SESSION['noNumberCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
    header('Location: cake.php');
    exit();
  }

  /* 
    ustawienie filtracji na inputy:
    - ilość
    - adres
    - telefon
    - komentarz
  */

  $count = 'sztuk';
  $number = filter_input(INPUT_POST, 'i');
  $mail = filter_input(INPUT_POST, 'adres', FILTER_VALIDATE_EMAIL);
  $phone = filter_input(INPUT_POST, 'telefon', FILTER_VALIDATE_INT);
  $comment = filter_input(INPUT_POST, 'komentarz');
  // ustawienie napisu potrzebnego do podsumowania

  /*
    tworzenie tablicy skojażeniowej z przefiltrowanymi u góry danymi oraz dodatkowymi:
    - data
    - czas
    te 2 dane są pobrane bezpośrednio bo nie ma potrzeby filtrowania numerów
    te polączenie daty i czasu z tablicą jest pod postacią:
    'data' => $_POST["data"],
    'czas' => $_POST["czas"],
  */
  $orderData = [
    'ilość' => $number,
    'data' => $_POST["data"],
    'czas' => $_POST["czas"],
    'email' => $mail,
    'telefon' => $phone,
    'komentarz' => $comment
  ];
  /**
   * tworzenie wyciszonej tablicy skojażeniowej dotyczącej checkboxów w formulażu
   * działa tak, że wyciszenie checboxów jest konieczne bo mogą przesyłać wartości true lub false a w tablicach musi być tak,
   * że wszystkie elementy muszą byc true.
   * po to jest to wyciszenie aby nie było errorów związanych z możliwością jednego zaznaczenia np:
   * e1 = true;
   * e2 = false;
   * e3 = false;
   * e4 = false;
   * to wtedy cała tablica = false a wyciszenie (@) niweluje errory
   */
  $prodType = @[
    'ur' => $_POST['urodzinowy'],
    'sm' => $_POST['smakosz'],
    'jub' => $_POST['jubileuszowy'],
    'slub' => $_POST['slubny']
  ];
  /**
   * poniżej jest blok który sprawdza czy są ustawione na true konkretne checkboxy np:
   * chbx3 = true; a reszta = false to uruchamia się odpowiedni warunek 
   */
  if (isset($prodType['ur'])) {
    $opt = 'Urodzinowy';
  }
  
  if (isset($prodType['sm'])) {
    $opt = 'dla Smakoszy';
  }

  if (isset($prodType['jub'])) {
    $opt = 'Jubileusz';
  }

  if (isset($prodType['slub'])) {
    $opt = 'Ślubny';
  }

  /**
   * warunek sprawdzania czy przypadkiem wszystkie checkboxy są zaznaczone, jeśli tak to error a jeśli nie to dodanie zamówienia do bazy 
   */
  if (isset($prodType['ur']) && isset($prodType['sm']) && isset($prodType['jub']) && isset($prodType['slub'])) {
    header('Location: control.php');
    exit();
  } else {
    // przygotowanie polecenia SQL wraz z bindami poniżej
    $query = $db->prepare("INSERT INTO zamowienia VALUES (NULL,:nazwa,:ilosc,:dat,:czas,:mail,:telefon,:kom)");
    /**
     * zwykła konfigurazja podsumowania jeśli ilość będzie <=1 to przypisze się sklejka tort + nazwa wybranego tortu (bez modyfikacji)
     * oraz gdy będzie coś innego (w else) to w sesji zapisze się sklejka tortów + nazwa tortu
     */
    if ($orderData['ilość'] <= 1) {
      $conf = $count . "ę";
      $num = 'Tort ' . $opt;
    } else {
      $conf = $count . "i";
      $num = 'Tortów ' . $opt;
    }
    
    // ustawienie bindów używanych w poleceniu SQL
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
  <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
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
            <a href="http://localhost/Wypiekarnia/">Strona Główna
              <i class="icon-home"></i>
            </a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)
            </a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/konto.php"><?php echo $_SESSION['profile']; ?><i class="icon-user-circle"></i></a>
          </li>
    </ul>
  </div>
  <div class="main">
    <?php
    echo "<h1>Podsumowanie</h1>";
    echo "<p>Zamówiłeś " . $orderdata['ilość'] . " " . $conf . "</p>";
    echo "<p><b> (" . $num . ") </b></p>";
    echo "<p>Na adres: " . $orderdata['email'] . "<p>";
    echo "<p>Numer Telefonu: " . $orderdata['telefon'] . "<p>";
    echo "<p>Na termin: " . $orderdata['data'] . "</p>";
    echo "<p>Godzinę: " . $orderdata['czas'] . "</p>";
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
    <!-- <h1 id="cart"><a href="http://localhost/Wypiekarnia/basket.php">Do Koszyka</a></h1> -->
    <div id="slider"></div>
  </div>
  <footer>Lorem ipsum</footer>
</body>

</html>