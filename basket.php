<?php
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
</head>

<body>
  <div class="up">
    <div id="logo" onclick="x()">
      <div id="a" class="row col-sm-6">
        <img src="img/logo1.png" title="Logo" alt="Logo" />
      </div>
      <div id="eggs" class="row col-sm-6 invisible"></div>
    </div>
    <ol>
      <li>
        <a href="#">MENU &#9776;</a>
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
    <div style="clear: both"></div>
  </div>
  <div class="main">
    <?php
    if (!isset($_SESSION['zalogowany'])) {
      header('Location: index.html');
      exit();
    }
    require_once "dbconnect.php";
    $conn = @new mysqli($host, $user, $password, $database);
    if ($conn->connect_errno != 0) {
      echo "Error:" . $conn->connect_errno;
    } else {
      $result = @$conn->query("SELECT klijeci.id AS cliid, produkty.id AS prodid, produkty.Nazwa AS p, zamowienia.ilosc AS i, zamowienia.dat AS d, zamowienia.godzina AS g FROM produkty JOIN klijeci, zamowienia WHERE logi='$_SESSION[login]' AND Nazwa = '$_SESSION[op]'");
      while ($row = $result->fetch_assoc()) {
    ?>
        <p><?php echo $row['p']
            ?></p>
        <p><?php echo $row['i']
            ?></p>
        <p><?php echo $row['d']
            ?></p>
        <p><?php echo $row['g']
            ?></p>
    <?php
        $idcli = $row['cliid'];
        $idpro = $row['prodid'];
        //$sql = "INSERT INTO relacje(id, id_klijenta, id_produktu, `status`, `data zamówienia`) VALUES (NULL,$idcli,$idpro,'oczekujący',)";
        //$result1 = @$conn->query($sql);
      }
    }
    $result->free();
    $conn->close();
    ?>
  </div>
  <footer>Lorem ipsum</footer>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>