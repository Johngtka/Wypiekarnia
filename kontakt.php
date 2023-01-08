<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Kontakt</title>
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
  <style>
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
            <a href="http://localhost/Wypiekarnia/konto.php">Konto <i class='fas'>&#xf406;</i></a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main">
    <h1>Tutaj morzesz się z nami skontaktować i zgłaszać błędy</h1>
    <ul>
      <li><span class="options">Napisz do nas: </span><a href="mailto: bakeryspprt2023@gmail.com">Wypiekarnia-Support</a></li>
    </ul>
    <div id="slider"></div>
    <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>