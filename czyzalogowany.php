<?php
//zaczęcie sesji
session_start();
//instrukcja sprawdzająca istnieje obiekt użytkownika
if (isset($_SESSION["user"])) {
    //przypisanie obiektu logowania do zmiennej
    $zalogowany_urzytkownik = $_SESSION["user"];
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
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
        <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
        <link rel="stylesheet" href="css1/font.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
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
        <style type="text/css">
            h1 {
                width: 100%;
                height: 160px;
                background-color: #000000;
                opacity: 0.5;
                color: #ffffff;
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 0;
            }

            @media screen {

                h1,
                a {
                    width: 100%;
                }
            }

            a {
                text-decoration: none;
                color: #ffffff;
            }

            a:hover {
                color: #ffffff;
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
                                <!--<i class="icon-home"></i>--> &#10224;
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
                        </li>
                        <li>
                            <a href="http://localhost/Wypiekarnia/aktuals.php">Aktualizacje &#9781; (<?php echo $_SESSION['akt'] ?>)</a>
                        </li>
                    </ul>
                </li>
            </ol>
        </div>
        <div class="main">
            <h1><b><i>Musisz się zalogować!!!</i></b><br><br><a href="konto.php">Logowanie</a></h1>
            <footer>Lorem ipsum</footer>
        </div>
        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
    // jeśli istnieje obiekt użytkownika to nic się nie stanie, a właściwie to zmienna $zalogowany_urzytkownik trafi do pamięci serwerai będzie można z niej korzystać
    exit();
}
