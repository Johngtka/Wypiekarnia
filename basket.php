<?php
require_once('PDO.php');
if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit();
} else {
  $log = $_SESSION['user'];
  $desc = @$_SESSION['op'];
  $query = $db->prepare("SELECT produkty.Nazwa AS  p, zamowienia.ilosc AS i, zamowienia.dat AS d, zamowienia.godzina AS g FROM produkty JOIN klijeci, zamowienia WHERE logi='$log[login]' AND Nazwa = '$desc'");
  $query->execute();
  $sql = "SELECT klijeci.id as cliid , produkty.id as prodid, zamowienia.dat as dat FROM klijeci JOIN zamowienia,produkty";
  $relq = $db->prepare($sql);
  $relq->execute();
  $date = $relq->fetch();
  $_SESSION['rel'] = @["kid" => $date['cliid'], 'pid' => $date['prodid'], "ordat" => $date['dat']];
}
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
    echo '<div id="zwrot">' . "<h3>Nazwa</h3>" . "<h3>Ilość</h3>" . "<h3>Data</h3>" . "<h3>Godzina</h3>";
    while ($row = $query->fetch()) {
    ?>
      <p><?php echo $row["p"]
          ?></p>
      <p><?php echo $row["i"]
          ?></p>
      <p><?php echo $row["d"]
          ?></p>
      <p><?php echo $row["g"]
          ?>
        <a href="http://localhost/Wypiekarnia/relacje.php"><button id="but">aktywuj zamówienie</button></a>
      </p>
    <?php
    }
    echo '</div>';
    // unset($log, $row);
    ?>
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>