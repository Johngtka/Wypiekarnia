<?php
require_once('PDO.php');
$query = $db->prepare("SELECT * FROM aktualizacje ORDER BY id DESC");
$query->execute();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8" />
    <title>Aktualizacje</title>
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
        #front-zwrot {
            width: auto;
            height: auto;
            background-color: #000;
            opacity: 0.5;
            color: #fff;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            margin: 0;
            text-shadow: #000;
            border-top: #fff solid 1px;
        }

        #front-zwrot>b {
            display: inline-block;
            background-color: #000;
            color: #fff;
        }

        #c {
            overflow-y: scroll;
            height: 100vh;
        }

        #front-zwrot>p {
            display: inline-block;
            color: #fff;
            width: 100%;
        }

        #k {
            border-radius: 0;
            width: 128px;
            height: 128px;
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
                        <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
                    </li>
                    <li>
                        <a href="http://localhost/Wypiekarnia/konto.php"><?php echo $_SESSION['profile']; ?><i class='icon-user-circle'></i></a>
                    </li>
                </ul>
    </div>
    <div class="main">
        <div id="c">
            <?php
            while ($row = $query->fetch()) {
            ?>
                <div id="front-zwrot">
                    <b><i><?php echo $row['Nazwa'] ?></i></b>
                    <p><?php echo $row['Data'] ?></p>
                    <div style="clear: both"></div>
                    <p id="#"><?php echo $row['Opis'] ?></p>
                </div>
            <?php
            }
            ?>
        </div>
        <footer>Lorem ipsum</footer>
    </div>
</body>

</html>