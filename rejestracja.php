<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="utf-8" />
    <title>Rejestracja</title>
</script>
    <meta name="description" content="Zamów swoje ulubione delicje" />
    <meta
      name="keywords"
      content="ciasta, torty, i, wypieki, na, każdą, okazję"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css1/font.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="icon" href="icon.png" sizes="32x32" type="image/png" />
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!--https://github.com/Johngtka/Wypiekarnia.git-->
    <!--Font section-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap"
      rel="stylesheet"
    />
    <script src="scripts.js"></script>
    <!--And of section-->
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
              <a href="http://localhost/Wypiekarnia/"
                >Strona Główna<i class="icon-home"></i></a>
            </li>
            <li>
              <a href="#">Kontakt<i class="icon-phone-squared"></i></a>
            </li>
            <li>
              <a href="#">Aktualizacje &#9781;</a>
            </li>
            <li>
              <a href="http://localhost/Wypiekarnia/basket.php"
                >Koszyk<i class="icon-basket"></i
              ></a>
            </li>
          </ul>
        </li>
      </ol>
      <div style="clear: both"></div>
    </div>
    <div class="main">
      <h1>Rejestracja:</h1>
        <form action="register.php" method="POST">
            <div class="row">
                <label>
                <b>Imie:</b><input type="text" name="name" placeholder="Wpisz Imie" required/>
                </label>
            </div>
            <div class="row">
            <label>
                <b>Nazwisko:</b><input type="text" name="subname" placeholder="Wpisz Nazwisko" required /><br>
            </label>
            </div>
            <div class="row">
            <label>
              <b>Adres Email:</b><input
                type="email"
                placeholder="example@gmail.com"
                name="adres"
                required /></label
            ></div>
            <div class="row">
              <label><b>Numer Telefonu:</b><input type="tel" name="telefon" placeholder="Max 9 znaków" required/></label>
            </div>
            <div class="row">
              <label><b>Login:</b><input type="text" name="login" placeholder="Max 10 znaków" required/></label>
            </div>
            <div class="row">
              <label><b>Hasło:</b><input type="password" name="password" placeholder="..." required/></label>
            </div>
            <div class="row">
              <label><input type="checkbox" name="rule" required/><b> - Akceptuje regulamin</b></label>
            </div>
            <input type="submit" value="Zarejestruj"/>
        </form>
        <div id="slider"></div>
    </div>
    <footer>Lorem ipsum</footer>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
