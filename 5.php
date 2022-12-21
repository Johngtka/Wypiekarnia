<?php
require_once "czyzalogowany.php";
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
            <a href="http://localhost/Wypiekarnia/konto.php">Konto <i class='fas'>&#xf406;</i></a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main">
    <?php
    //system generowania odpowiednio spreparowanego podsumowania zamówienia
    $i = $_POST["i"];
    $adres = $_POST["adres"];
    $telefon = $_POST["telefon"];
    $data = $_POST["data"];
    $czas = $_POST["czas"];
    $komentarz = $_POST["komentarz"];
    echo "<h1>Podsumowanie</h1>";
    echo "<p>Zamówiłeś $i</p>";
    //5 warunków sprawdzających czy dany checkbox jest zaznaczony i czy zaznaczone wszystkie
    if (isset($_POST['czek'])) {
      echo "<b>Ciasteczka z czekoladą (Amerykańskie)</b><br>";
      $opt = array('nazwa' => 'Ciasteczka z czekoladą (Amerykańskie)');
      $_SESSION['op'] = $opt['nazwa'];
    }
    if (isset($_POST['ziarna'])) {
      echo "<b>Ciasteczka Ziarna w Karmelu</b><br>";
      $opt = array('nazwa' => 'Ciasteczka Ziarna w Karmelu');
      $_SESSION['op'] = $opt['nazwa'];
    }
    if (isset($_POST['ziarna'])) {
      echo "<b>Ciasteczka owsiane z bakaliami</b><br>";
      $opt = array('nazwa' => 'Ciasteczka owsiane z bakaliami');
      $_SESSION['op'] = $opt['nazwa'];
    }
    if (isset($_POST['cantuccini'])) {
      echo "<b>Ciastka Cantuccini</b><br>";
      $opt = array('nazwa' => 'Ciasteczka Cantuccini');
      $_SESSION['op'] = $opt['nazwa'];
    }
    //zabezpieczenie przed zaznaczeniem wszystkich checkboxów prowadzące do kontrolki z informacją o tym
    if (isset($_POST['czek']) && isset($_POST['ziarna']) && isset($_POST['ziarna']) && isset($_POST['cantuccini'])) {
      header('Location: control.php');
      exit();
    } else {
      echo "<p>Na adres $adres<p>";
      echo "<p>Numer Telefonu: $telefon<p>";
      echo "<p>Na termin: $data</p>";
      echo "<p>Godzinę: $czas</p>";
      echo "<h1>Z komentarzem:</h1>";
      echo "<br> $komentarz<br><br>";
      echo "<input type='button' onclick='window.print()' value='Drukuj Potwierdzenie'/>";
      // echo "<h1>Wybierz Metode Płatności:</h1>";
      //sprawdzenie poprawności połączenia z bazą
      require_once "dbconnect.php";
      $conn = @new mysqli($host, $user, $password, $database);
      if ($conn->connect_errno != 0) {
        echo "Error:" . $conn->connect_errno;
      } else {
        //wpisanie do tabeli zamówienia danych przesłanych z formularza z uwzględnieniem preparacji zamówienia
        $sql = "INSERT INTO zamowienia(id, nazwa_produkt, ilosc, dat, godzina, mail, telefon, kom) VALUES (NULL,'$_SESSION[op]','$i','$data','$czas','$adres','$telefon','$komentarz')";
        $result = @$conn->query($sql);
        $conn->close();
      }
    }
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