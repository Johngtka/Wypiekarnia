<?php
require_once "PDO.php";
$regtab = [
  'imie' => $_POST['name'],
  'nazwisko' => $_POST['subname'],
  'mail' => $_POST['adres'],
  'num' => $_POST['telefon'],
  'username' => $_POST['login'],
  'haslo' => $_POST['password']
];
if (isset($regtab['imie']) && isset($regtab['nazwisko']) && isset($regtab['mail']) && isset($regtab['num']) && isset($regtab['username']) && isset($regtab['haslo'])) {
  $email = filter_input(INPUT_POST, 'adres', FILTER_VALIDATE_EMAIL);
  // if (empty($email) || empty($regtab['haslo'])) {
  //   $_SESSION['logdata'] = "Wpisz Ponownie ;-)";
  //   header('Location: rejestracja.php');
  // } else {
  //   unset($_SESSION['logdata']);
  //   exit();
  // }
  $sql = "INSERT INTO klijeci(id, imie, nazwisko, mail, telefon, logi, haslo) VALUES (NULL,'$regtab[imie]','$regtab[nazwisko]',:email,'$regtab[num]','$regtab[username]','$regtab[haslo]')";
  $query = $db->prepare($sql);
  $query->bindValue(':email', $email, PDO::PARAM_STR);
  $query->execute();
} else {
  header('Location: rejestracja.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Rejestracja</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css1/font.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
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
    h1 {
      width: 1000px;
      height: 110px;
      background-color: #000;
      opacity: 0.5;
      color: #fff;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
    }

    h2 {
      width: 1000px;
      height: 110px;
      background-color: #000;
      opacity: 0.5;
      color: #fff;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
      padding-top: 25px;
    }

    @media screen and (max-width:600px) {

      h1,
      h2,
      a {
        width: 100%;
      }
    }

    @media screen and (max-width:850px) {

      h1,
      h2,
      a {
        width: 100%;
      }
    }

    @media screen and (max-width:1000px) {

      h1,
      h2,
      a {
        width: 100%;
      }
    }

    a {
      text-decoration: none;
      color: #fff;
      width: 400px;
      height: 110px;
    }

    a:hover {
      color: #fff;
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
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)
            </a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main">
    <?php
    echo "<h1>Witaj<br>" . $regtab['username'] . "</h1>";
    echo "<h2><a href='http://localhost/Wypiekarnia/konto.php'>Strona Logowania <i class='fas'>&#xf406;</i></a></h2>";
    ?>
    <br>
    <div id="slider"></div>
    <br><br><br><br>
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>