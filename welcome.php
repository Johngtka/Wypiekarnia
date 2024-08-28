<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8" />
    <title>Witamy</title>
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
        <?php
        echo "<h1 id='d'>Witaj<br>" . $_SESSION['exportUserData'] . "</h1>";
        echo "<h2><a href='http://localhost/Wypiekarnia/loginForm.php'>Strona Logowania <i class='icon-user-circle'></i></a></h2>";
        ?>
        <br>
        <div id="slider"></div>
        <br><br><br><br>
        <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
    </div>
</body>

</html>