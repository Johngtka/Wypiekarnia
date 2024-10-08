<?php
session_start();
$log = @$_SESSION['user'];
if (isset($log)) {
  $nick = $log['login'];
} else {
  $nick = 'Zaloguj się';
}
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Kontakt</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./logo.png" sizes="64x64" type="image/png" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css1/fontello.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <script src="js/bootstrap.min.js"></script>
  <script src="jquery-3.7.0.min.js"></script>
  <script src="scripts.js"></script>

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
    ul>li::marker {
      font-size: 30px;
    }

    .main h1 {
      text-decoration: dashed underline;
    }

    .options {
      font-size: 30px;
      text-shadow: -1px 1px 2px #000,
        1px 1px 2px #000,
        1px -1px 0 #000,
        -1px -1px 0 #000;
    }

    .main ul>li {
      font-size: 35px;
      color: #fff;
    }

    .main ul>li>a {
      /* opacity: 0.7; */
      color: #d87e4c;
      text-shadow: -1px 1px 2px #000,
        1px 1px 2px #000,
        1px -1px 0 #000,
        -1px -1px 0 #000;
      text-decoration: underline;
    }

    .main ul>li>a:hover {
      color: #d87e4c;
    }
  </style>
</head>

<body>
  <div class="up">
    <div id="logo">
      <div id="a">
        <img src="img/logo1.png" title="Logo" alt="Logo" />
      </div>
    </div>
    <ul>
      <li>
        <a href="http://localhost/Wypiekarnia/">Strona Główna <i class="icon-home"></i></a>
      </li>
      <li>
        <a href="http://localhost/Wypiekarnia/updates.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
      </li>
      <li>
        <a href="http://localhost/Wypiekarnia/loginForm.php"><?php echo $nick; ?> <i class="icon-user-circle"></i></a>
      </li>
    </ul>
  </div>
  <div class="main">
    <h1>Tutaj morzesz się z nami skontaktować i zgłaszać błędy</h1>
    <ul>
      <li><span class="options">Napisz do nas: </span><a href="mailto: bakeryspprt2023@gmail.com"><i class="icon-mail"></i>Wypiekarnia Support</a></li>
    </ul>
    <div id="slider"></div>
  </div>
  <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
</body>

</html>