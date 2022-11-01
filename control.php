<!DOCTYPE HTML>
<html lang="pl-PL">

<head>
    <meta charset="utf-8" />
    <title>Kontrola</title>
    <meta name="description" content="Zamów swoje ulubione delicje" />
    <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="icon" href="icon.png" sizes="32x32" type="image/png" />
    <link rel="stylesheet" href="css1/font.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!--Font section-->
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
    <!--And of section-->
    <style type="text/css">
        h1 {
            width: 1000px;
            height: 110px;
            background-color: #000000;
            opacity: 0.5;
            color: #ffffff;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 0;
        }

        h2 {
            width: 1000px;
            height: 110px;
            background-color: #000000;
            opacity: 0.5;
            color: #ffffff;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 0;
            padding-top: 25px;
        }

        a {
            text-decoration: none;
            color: #ffffff;
            width: 400px;
            height: 110px;
        }

        a:hover {
            color: #ffffff;
        }
    </style>
</head>

<body>
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
                        <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
                    </li>
                    <li>
                        <a href="#">Aktualizacje &#9781;</a>
                    </li>
                </ul>
            </li>
        </ol>
        <div style="clear: both;"></div>
    </div>
    <div class="main">
        <?php
        if (!isset($_POST['urodzinowy']) || !isset($_POST['smakosz']) || !isset($_POST['jubileuszowy']) || !isset($_POST['slubny'])) {
            header('Location: index.html');
        }
        echo "<h1><b><i>Musisz dokonać tylko 1 wyboru<br> Lub zrobic wiele zamówień!!!</i></b></h1>";
        echo '<h2><a href="index.html">Strona Główna</a></h2>';
        ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <footer>Lorem ipsum</footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>