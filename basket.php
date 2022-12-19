<?php
// start sesji
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Koszyk</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="stylesheet" href="css1/font.css" type="text/css" />
  <script src="scripts.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
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
    #zwrot {
      background-color: #fff;
      width: 100%;
      padding-top: 10px;
      padding-bottom: 10px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
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
              <!--<i class="icon-home"></i>--> &#10224;
            </a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/konto.php">Konto &#9865;</a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main">
    <?php
    // if sprawdzający czy istnieje obiekt urzytkownika
    if (!isset($_SESSION['user'])) {
      header('Location: index.php');
      exit();
    } else {
      // połączenie z bazą wraz ze sprawdzeniem poprawności połączenia
      require_once "dbconnect.php";
      $conn = @new mysqli($host, $user, $password, $database);
      if ($conn->connect_errno != 0) {
        echo "Error:" . $conn->connect_errno;
      }
      // do zmiennej log dopisuje obiekt urzytkownika
      $log = $_SESSION['user'];
      // style="display: none;width: 100%;"
      // polecenie sql, log[login] to jest kolumna tablicy obiektu użytkownika, $_session[op] to jest zmienna tworzona na poziomie podsumowania zamówienia
      $result = @$conn->query("SELECT produkty.Nazwa AS p, zamowienia.ilosc AS i, zamowienia.dat AS d, zamowienia.godzina AS g FROM produkty JOIN klijeci, zamowienia WHERE logi='$log[login]' AND Nazwa = '$_SESSION[op]'");
      // konkatenowanie otwarcia diva z wynikiem zapytania i pętlą z nazwami kolumn stylizowanymi za pomocą siatki css
      echo '<div id="zwrot">' . "<h3>Nazwa</h3>" . "<h3>Ilość</h3>" . "<h3>Data</h3>" . "<h3>Godzina</h3>";
      // pętla która zwraca dane wyciągnięte z bazy jako poprawny wynik
      while ($row = $result->fetch_assoc()) {
    ?>
        <p><?php echo $row["p"]
            ?></p>
        <p><?php echo $row["i"]
            ?></p>
        <p><?php echo $row["d"]
            ?></p>
        <p><?php echo $row["g"]
            ?><a href="http://localhost/Wypiekarnia/relacje.php"><button>aktywuj zamówienie</button></a></p>
    <?php
      }
      // zakończenie diva
      echo '</div>';
    }
    $sql = "SELECT klijeci.id as cliid , produkty.id as prodid, zamowienia.dat as dat FROM klijeci JOIN zamowienia,produkty";
    $result1 = @$conn->query($sql);
    $date = $result1->fetch_assoc();
    @$_SESSION['rel'] = ["kid" => $date['cliid'], "pid" => $date['prodid'], "ordat" => $date['dat']];
    $conn->close();
    ?>
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>