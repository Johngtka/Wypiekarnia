<?php
session_start();
require_once "dbconnect.php";
//połączenie i sprawdzenie poprawności połączenia z bazą
$conn = @new mysqli($host, $user, $password, $database);
if ($conn->connect_errno != 0) {
  echo "Error: " . $conn->connect_errno;
} else {
  //sumowanie wierszy z tabeli aktualizacje i zapisywanie tej sumy do zmiennej
  $result1 = @$conn->query("SELECT COUNT(*) FROM aktualizacje");
  //print_r($result1->fetch_row()[0]);
  $_SESSION['akt'] = $result1->fetch_row()[0];
}
$result1->free();
$conn->close();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="utf-8" />
  <title>Strona Główna</title>
  <meta name="description" content="Zamów swoje ulubione delicje" />
  <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css1/font.css" type="text/css" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
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
            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)
            </a>
          </li>
          <li>
            <a href="http://localhost/Wypiekarnia/konto.php">Konto &#9865;</a>
          </li>
        </ul>
      </li>
    </ol>
  </div>
  <div class="main">
    <h1><b>O piekarni:</b></h1>
    <p>
      <b>
        <br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
        eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum
        odio eu feugiat pretium nibh ipsum consequat. Nunc vel risus commodo
        viverra maecenas. Dolor magna eget est lorem. Ut sem nulla pharetra
        diam sit amet nisl suscipit adipiscing. Lacus sed viverra tellus in
        hac habitasse platea dictumst vestibulum. Quis blandit turpis cursus
        in. Turpis nunc eget lorem dolor sed viverra ipsum nunc. Eget nullam
        non nisi est sit amet facilisis magna etiam. Aliquam id diam maecenas
        ultricies. Gravida cum sociis natoque penatibus et magnis dis
        parturient. Interdum velit laoreet id donec ultrices tincidunt.
        Condimentum lacinia quis vel eros donec ac odio tempor orci. Non
        consectetur a erat nam at lectus urna duis. Risus at ultrices mi
        tempus imperdiet nulla malesuada pellentesque elit. Sem et tortor
        consequat id. Commodo viverra maecenas accumsan lacus vel facilisis
        volutpat est. Non blandit massa enim nec dui nunc mattis enim ut.</b>
    </p>
    <h1><b>Nasze Produkty:</b></h1>
    <br />
    <div class="peace">
      <figure>
        <a href="http://localhost/Wypiekarnia/cake.php"><img src="slajdy/slajd1.png" alt="Torty" /></a>
        <a href="#">
          <figcaption><b>Torty</b></figcaption>
        </a>
      </figure>
    </div>
    <div class="peace">
      <figure>
        <a href="http://localhost/Wypiekarnia/ciasta.php"><img src="slajdy/slajd2.png" alt="Ciasta" /></a>
        <a href="#">
          <figcaption><b>Ciasta</b></figcaption>
        </a>
      </figure>
    </div>
    <div class="peace">
      <figure>
        <a href="http://localhost/Wypiekarnia/tarty.php"><img src="slajdy/slajd3.png" alt="Tarty" /></a>
        <a href="#">
          <figcaption><b>Tarty</b></figcaption>
        </a>
      </figure>
    </div>
    <br /><br />
    <div class="peace">
      <figure>
        <a href="http://localhost/Wypiekarnia/babeczki.php"><img src="slajdy/slajd4.png" alt="Babeczki" /></a>
        <a href="#">
          <figcaption><b>Babeczki</b></figcaption>
        </a>
      </figure>
    </div>
    <div class="peace">
      <figure>
        <a href="http://localhost/Wypiekarnia/ciastka.php"><img src="slajdy/slajd5.png" alt="Ciasteczka" /></a>
        <a href="#">
          <figcaption><b>Ciasteczka</b></figcaption>
        </a>
      </figure>
    </div>
    <div class="peace">
      <figure>
        <a href="http://localhost/Wypiekarnia/bulki.php"><img src="slajdy/slajd6.png" alt="Bułeczki" /></a>
        <a href="#">
          <figcaption><b>Bułeczki</b></figcaption>
        </a>
      </figure>
    </div>
    <h1><b>Nasza Galeria:</b></h1>
    <p>
      <b><br />Mauris nunc congue nisi vitae suscipit tellus. At quis risus
        sed vulputate odio ut enim blandit volutpat. Tristique risus nec
        feugiat in fermentum posuere urna. Ornare arcu odio ut sem nulla
        pharetra. Enim praesent elementum facilisis leo vel fringilla. Justo
        eget magna fermentum iaculis. Quam pellentesque nec nam aliquam sem.
        Venenatis cras sed felis eget velit. Integer enim neque volutpat ac
        tincidunt vitae semper quis lectus. Nulla aliquet enim tortor at
        auctor urna nunc id. Mauris in aliquam sem fringilla ut morbi
        tincidunt augue. Praesent tristique magna sit amet purus gravida quis
        blandit. Cursus in hac habitasse platea. Sit amet mauris commodo quis
        imperdiet massa tincidunt nunc. Scelerisque viverra mauris in aliquam
        sem fringilla ut morbi. Commodo nulla facilisi nullam vehicula ipsum a
        arcu cursus. Nunc id cursus metus aliquam eleifend mi in. Orci ac
        auctor augue mauris augue neque. Mi quis hendrerit dolor magna. Eros
        donec ac odio tempor orci dapibus ultrices in iaculis.</b>
    </p>
    <div id="slider"></div>
  </div>
  <footer>Lorem ipsum</footer>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>