<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Do widzenia</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css1/font.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="icon" href="icon.png" sizes="32x32" type="image/png" />
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
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
</head>

<body onload="zmienslajd()">
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
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
          </li>
        </ul>
      </li>
    </ol>
    <div style="clear: both"></div>
  </div>
  <div class="main">
    <?php
    if (!isset($_POST['login']) || !isset($_POST['haslo'])) {
      header('Location: wyjscie.php');
      exit();
    }
    require_once "dbconnect.php";
    $conn = @new mysqli($host, $user, $password, $database);
    if ($conn->connect_errno != 0) {
      echo "Error:" . $conn->connect_errno;
    } else {
      $log = $_POST['login'];
      $pass = $_POST['haslo'];
      $sql = "DELETE FROM klijeci WHERE logi='$log' AND haslo='$pass'";
      $result = @$conn->query($sql);
      $conn->close();
      session_unset();
      header("Location:index.html");
    }
    ?>
    <h1>Już nas opuszczasz?</h1>
    <p>------------------------------------</p>
    <h6>
      <p>Szkoda ale spokojnie nie gniewamy się.<br>Możesz do nas wrócić w każdej chwili.<br> A teraz, jak to mówił Ogórek z filmu Auta: <br><b>"<i>Leć, stasieniek, leć i odleć</i>"</b></p>
    </h6>

    <div id="slider"></div>
  </div>
  <footer>Lorem ipsum</footer>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>