<?php
// podłączenie się do silnika pdo
require_once('PDO.php');

//warunek który sprawdza czy nie są ustawione login i hasło w formularzu logowania
if (!isset($_POST['login']) && !isset($_POST['password'])) {
  header('Location: index.php');
  exit();
} else {

  if(!ctype_digit($_POST['phone'])){
    $_SESSION['noNumberCorrect'] = '<span style="color: red"><b>*Wpisz poprawny NUMER!!! telefonu</b></span>';
    header('Location: rejestracja.php');
    exit();
  }

  // przepuszczenie wartości z formularza rejestracji przez filtrację

  $name = filter_input(INPUT_POST, 'name');
  $surname = filter_input(INPUT_POST, 'surname');
  $email = filter_input(INPUT_POST, 'location', FILTER_VALIDATE_EMAIL);
  $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
  $uname = filter_input(INPUT_POST, 'login');
  $pass = filter_input(INPUT_POST, 'password');

  // lokalna tablica asocjacyjna zawierająca połączenie skojażenia z danymi z filtracji

  $regTab = [
    'imie' => $name,
    'nazwisko' => $surname,
    'mail' => $email,
    'telefon' => $phone,
    'login' => $uname,
    'haslo' => $pass
  ];

  // sprawdzenie czy przefiltrowane dane są ustawione
  if (isset($regTab)) {
    // przygotowanie polecenia które sprawdzi czy już istnieje taki user
    $checkUser = $db->prepare("SELECT * FROM klijeci WHERE logi=:uLogin AND mail=:email");

    $checkUser->bindParam(':uLogin', $regTab['login'], PDO::PARAM_STR);
    $checkUser->bindParam(':email', $regTab['mail'], PDO::PARAM_STR);

    $checkUser->execute();
    // warunek sprawdzający czy wynik zapytania jest poprawny

    if ($checkUser->rowCount() == 1) {

      $_SESSION['errchx'] = '<span style="color: red"><b>*Taki użytkownik już istnieje</b></span>';
      header('Location: rejestracja.php');
      exit();

    } else {
      unset($_SESSION['errchx']);
      // przygotowanie polecenia które wstawi usera 

      $query = $db->prepare("INSERT INTO klijeci VALUES (NULL,:nam,:surname,:email,:phone,:uname,:pass)");

      // proces bindowania wartości z filtracji z tablicy asocjacyjnej pod dane tagi w zapytaniu
      $query->bindValue(':nam', $regTab['imie'], PDO::PARAM_STR);
      $query->bindValue(':surname', $regTab['nazwisko'], PDO::PARAM_STR);
      $query->bindValue(':email', $regTab['mail'], PDO::PARAM_STR);
      $query->bindValue(':phone', $regTab['telefon'], PDO::PARAM_INT);
      $query->bindValue(':uname', $regTab['login'], PDO::PARAM_STR);
      $query->bindValue(':pass', $regTab['haslo'], PDO::PARAM_STR);
      $query->execute();
    }
  } else {
    header('Location: rejestracja.php');
    exit();
  }
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
  <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css1/fontello.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
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
    #d {
      height: 120px;
      background-color: #000;
      opacity: 0.5;
      color: #fff;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
      padding-top: 25px;
    }

    h2 {
      height: 120px;
      background-color: #000;
      opacity: 0.5;
      color: #fff;
      margin-left: auto;
      margin-right: auto;
      margin-bottom: 0;
      padding-top: 25px;
    }

    @media only screen and (min-width:600px) {
      #d,
      h2,
      a {
        width: 60%;
      }
    }
    @media only screen and (max-width:600px) {
      #d,
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
    </ul>
  </div>
  <div class="main">
    <?php
    echo "<h1 id='d'>Witaj<br>" . $regTab['login'] . "</h1>";
    echo "<h2><a href='http://localhost/Wypiekarnia/konto.php'>Strona Logowania <i class='icon-user-circle'></i></a></h2>";
    ?>
    <br>
    <div id="slider"></div>
    <br><br><br><br>
    <footer>Lorem ipsum</footer>
  </div>
</body>

</html>