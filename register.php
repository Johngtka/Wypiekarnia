<?php
// podłączenie się do silnika pdo
require_once('PDO.php');

//warunek który sprawdza czy nie są ustawione login i hasło w formularzu logowania
if (!isset($_POST['login']) && !isset($_POST['password'])) {
  header('Location: index.php');
  exit();
}

// przepuszczenie wartości z formularza rejestracji przez filtrację

$name = filter_input(INPUT_POST, 'name');
$subname = filter_input(INPUT_POST, 'subname');
$email = filter_input(INPUT_POST, 'adres', FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, 'telefon');
$uname = filter_input(INPUT_POST, 'login');
$pass = filter_input(INPUT_POST, 'password');

// lokalna tablica asocjacyjna zawierająca połączenie skojażenia z danymi z filtracji

$regtab = [
  'imie' => $name,
  'nazwisko' => $subname,
  'mail' => $email,
  'telefon' => $phone,
  'login' => $uname,
  'haslo' => $pass
];

// sprawdzenie czy przefiltrowane dane są ustawione
if (isset($regtab)) {
  // przygotowanie polecenia które sprawdzi czy już istnieje taki user
  $checkuser = $db->prepare("SELECT * FROM klijeci WHERE logi='{$regtab['login']}' AND mail='{$regtab['mail']}'");
  $checkuser->execute();
  // warunek sprawdzający czy wynik zapytania jest poprawny

  if ($checkuser->rowCount() == 1) {
    $_SESSION['errchx'] = '<span style="color: red"><b>*Taki użytkownik już istnieje</b></span>';
    header('Location: rejestracja.php');
    exit();
  } else {
    unset($_SESSION['errchx']);
    // przygotowanie polecenia które wstawi usera 

    $query = $db->prepare("INSERT INTO klijeci VALUES (NULL,:nam,:subname,:email,:phone,:uname,:pass)");

    // proces bindowania wartości z filtracji z tablicy asocjacyjnej pod dane tagi w zapytaniu
    $query->bindValue(':nam', $regtab['imie'], PDO::PARAM_STR);
    $query->bindValue(':subname', $regtab['nazwisko'], PDO::PARAM_STR);
    $query->bindValue(':email', $regtab['mail'], PDO::PARAM_STR);
    $query->bindValue(':phone', $regtab['telefon'], PDO::PARAM_INT);
    $query->bindValue(':uname', $regtab['login'], PDO::PARAM_STR);
    $query->bindValue(':pass', $regtab['haslo'], PDO::PARAM_STR);
    $query->execute();
  }
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
    #d {
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

    @media only screen and (max-width:600px) and (max-width:850px) and (max-width:1000px) {

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
    echo "<h1 id='d'>Witaj<br>" . $regtab['login'] . "</h1>";
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