<?php
// podłączenie dokumentu który sprawdza czy jest zalogowanu user
require_once('loginVerify.php');
$query = $db->prepare("SELECT * FROM promocje");
$query->execute();
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8" />
    <title>Promocje</title>
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
        .salesPanel {
            width: fit-content;
            height: 100vh;
            padding: 5%;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            background-color: #fff;
            border: 2px solid #000;
            justify-content: center;
            border-radius: 40px;
        }

        .saleTile {
            width: auto;
            padding-left: 20px;
            padding-right: 20px;
            display: flex;
            flex-direction: column;
            height: auto;
            align-items: center;
            justify-content: center;
            background-color: #000;
            color: #fff;
        }

        .saleTile h1 {
            color: #fff;
            text-shadow: none;
        }

        .salesPanel span {
            font-size: 16px;
        }

        .saleTile p {
            background-color: #f00;
            border: 2px solid #fff;
            padding: 5px;
            font-size: 15px;
        }

        .saleTile h1,
        span,
        p {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .saleTile h1:hover,
        span:hover,
        p:hover {
            cursor: default !important;
        }

        @media screen and (max-width: 1050px) {
            .salesPanel {
                flex-direction: column;
                width: 100%;
                padding: 0 !important;
                height: auto;
            }

            .saleTile {
                padding: 0 !important;
                height: auto;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        footer {
            margin-top: 20px;
        }
    </style>
    <script>
        function copyToClipboard(code) {
            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = code;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);

            alert("Kod promocyjny skopiowany!!!");
        }
    </script>
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
            <li>
                <a href="http://localhost/Wypiekarnia/loginForm.php"><?php echo $_SESSION['user']['login']; ?><i class="icon-user-circle"></i></a>
            </li>
        </ul>
    </div>
    <div class="main">
        <div class="salesPanel">
            <?php
            while ($row = $query->fetch()) {
            ?>
                <div class="saleTile">
                    <h1>-<?php echo $row['Value'] ?>%</h1>
                    <span><?php echo $row['ProductName'] ?></span>
                    <p><?php echo $row['StartDate'] ?> - <?php echo $row['EndDate'] ?></p>
                    <h5><button style="width: 100%; display:flex; justify-content: center; padding-top: 10px; padding-bottom: 10px; padding-left:10px; padding-right:10px; margin-top:15px; border-radius: 10px; font-weight: bold" onclick="copyToClipboard('<?php echo $row['SaleCode'] ?>')">Skopiuj Kod📋</button></h3>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
    <footer>Wypiekarnia.pl <span id="actualYear"></span> Wszelkie Prawa Zastrzeżone</footer>
</body>

</html>