<?php
require_once('PDO.php');
//instrukcja sprawdzająca jest zalogowany user
if (isset($_SESSION['user'])) {
    //przypisanie obiektu logowania do zmiennej
    $zalogowany_urzytkownik = $_SESSION['user'];
    // $order = $db->prepare("SELECT COUNT(*) FROM zamowienia JOIN klijeci WHERE logi='$zalogowany_urzytkownik[login]'");
    // $order->execute();
    // $_SESSION['orders'] = $order->fetch()[0];
} else {
?>
    <!-- przeciwny warunek do if generuje error -->
    <!DOCTYPE HTML>
    <html lang="pl-PL">

    <head>
        <meta charset="utf-8" />
        <title>Kontrola</title>
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
                width: 100%;
                height: 160px;
                background-color: #000;
                opacity: 0.5;
                color: #fff;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 0;
            }

            @media only screen and (max-width: 600px) and (max-width:850px) and (max-width:1000px) {

                h1,
                a {
                    width: 100%;
                }
            }

            a {
                text-decoration: none;
                color: #fff;
            }

            a:hover {
                color: #fff;
            }

            footer {
                margin-top: 20px;
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
            <h1>
                <b>Musisz się zalogować!!!</b>
                <br><br>
                <a href="http://localhost/Wypiekarnia/loginForm.php">Zaloguj się <i class="icon-login"></i></a>
            </h1>
            <div id="slider"></div>
            <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
        </div>
    </body>

    </html>
<?php
    // jeśli istnieje obiekt użytkownika to nic się nie stanie, a właściwie to zmienna $zalogowany_urzytkownik trafi do pamięci serwera i będzie można z niej korzystać
    exit();
}
