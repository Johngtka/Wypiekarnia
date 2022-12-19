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
        <?php
        require_once("czyzalogowany.php");
        require_once "dbconnect.php";
        $report = $_SESSION['rel'];
        $status = "w przygotowaniu";
        $conn = @new mysqli($host, $user, $password, $database);
        if ($conn->connect_errno != 0) {
            echo "Error:" . $conn->connect_errno;
        } else {
            $sql = "INSERT INTO relacje VALUES (NULL,$report[kid],$report[pid],'$status','$report[ordat]')";
            $result = @$conn->query($sql);
            $conn->close();
        }
        ?>
    </div>
</body>

</html>