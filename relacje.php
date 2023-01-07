<?php
require_once("PDO.php");
$report = $_SESSION['rel'];
$sql = "INSERT INTO relacje VALUES (NULL,$report[kid],$report[pid],'w przygotowaniu','$report[ordat]')";
$relquery = $db->prepare($sql);
$relquery->execute();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Aktywacja Zamówienia</title>
    <meta name="description" content="Zamów swoje ulubione delicje" />
    <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="icon" href="./ic.png" sizes="64x64" type="image/png" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css1/font.css" type="text/css" />
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
    <style type="text/css">
        #back {
            width: 1000px;
            height: 110px;
            background-color: #000;
            opacity: 0.5;
            text-align: center;
            padding: 3%;
            color: #fff;
            display: block;
            margin-left: auto;
            margin-right: auto;
            /* margin-bottom: 0; */
        }

        #ret {
            width: 1000px;
            height: 110px;
            background-color: #000;
            opacity: 0.5;
            text-align: center;
            padding: 3%;
            color: #fff;
            font-size: 30px;
            text-decoration: none;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #back a:hover {
            color: #fff;
        }

        @media screen and (max-width:600px) {

            #back,
            #ret,
            a {
                width: 100%;
            }

        }

        @media screen and (max-width:850px) {

            #back,
            #ret,
            a {
                width: 100%;
            }
        }

        @media screen and (max-width:1000px) {

            #back,
            #ret,
            a {
                width: 100%;
            }
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
                        <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
                    </li>
                    <li>
                        <a href="http://localhost/Wypiekarnia/konto.php">Konto <i class='fas'>&#xf406;</i></a>
                    </li>
                </ul>
            </li>
        </ol>
    </div>
    <div class="main">
        <h1 id="back">Aktywowano zamówienie</h1>
        <a id="ret" href="http://localhost/Wypiekarnia/basket.php">Powrót</a>
        <div id="slider"></div>
        <footer>Lorem ipsum</footer>
    </div>
</body>

</html>