<?php
require_once('PDO.php');
if (isset($_SESSION['user'])) {
  header('Location: user.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Logowanie</title>
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
    .formButtons {
      width: 100%;
      display: flex;
      justify-content: center;
      margin-top: 25px;
      margin-bottom: 25px;
    }

    button[type="submit"],
    .regLink {
      padding: 10px;
      border-radius: 10px;
      font-weight: bold;
      border: 2px #000 solid;
      margin: 5px;
    }

    .regLink a {
      color: #000;
    }

    @media only screen and (max-width:600px) and (max-width:850px) and (max-width:1000px) {

      .row,
      p,
      label {
        width: 100%;
      }

    }

    footer {
      margin-top: 20px;
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
        <a href="http://localhost/Wypiekarnia/contact.php">Kontakt<i class="icon-phone-squared"></i></a>
      </li>
    </ul>
  </div>
  <div class="main">
    <h1>Logowanie:</h1>
    <form action="login.php" method="POST">
      <div class="row">
        <label>
          <b>Login:</b><input type="text" name="login" placeholder="Wpisz Login" required />
        </label>
      </div>
      <div class="row">
        <label>
          <b>Hasło:</b><input type="password" name="password" placeholder="Wpisz Hasło" required />
        </label>
        <?php
        if (isset($_SESSION['err'])) {
          echo $_SESSION['err'];
          unset($_SESSION['err']);
        }
        if (isset($_SESSION['newLog'])) {
          echo $_SESSION['newLog'];
          unset($_SESSION['newLog']);
        }
        ?>
      </div>
      <div class="formButtons">
        <button type="submit">Zaloguj Się <i class="icon-login"></i></button>
        <a href="http://localhost/Wypiekarnia/registerForm.php"><button type="button" class="regLink">Zarejestruj Się <i class="icon-registered"></i></button></a>
      </div>
    </form>
    <div id="slider"></div>
    <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
  </div>
</body>

</html>