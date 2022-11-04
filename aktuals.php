<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="utf-8" />
    <title>Aktualizacje</title>
    <meta name="description" content="Zamów swoje ulubione delicje" />
    <meta name="keywords" content="ciasta, torty, i, wypieki, na, każdą, okazję" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="icon" href="icon.png" sizes="32x32" type="image/png" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css1/font.css" type="text/css" />
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
        #front-zwrot {
            width: auto;
            height: auto;
            background-color: #000000;
            opacity: 0.5;
            color: #ffffff;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 0;
            border-top: #ffffff solid 1px;
        }

        .main {
            padding: 0;
            width: 100%;

        }

        #front-zwrot>b {
            display: inline-block;
            background-color: #000000;
            color: #ffffff;
        }

        #c {
            overflow-y: scroll;
            height: 700px;
        }

        #front-zwrot>p {
            display: inline-block;
            color: #ffffff;
            width: 100%;
        }

        /*#op {
            text-align: center;
            width: 700px;
        }*/
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
                        <a href="http://localhost/Wypiekarnia/">Strona Główna
                            <!--<i class="icon-home"></i>--> &#10224;
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
                    </li>
                </ul>
            </li>
        </ol>
        <div style="clear: both"></div>
    </div>
    <div class="main">
        <div id="c">
            <?php
            //system dynamicznych aktualizacji zarządzanych przez bazę danych
            session_start();
            require_once "dbconnect.php";
            //połączenie i sprawdzenie poprawności połączenia z bazą
            $conn = @new mysqli($host, $user, $password, $database);
            if ($conn->connect_errno != 0) {
                echo "Error: " . $conn->connect_errno;
            } else {
                //zliczenie ilości rekordów z tabeli aktualizacji i przypisanie jej do zmiennej sesyjnej jako obejście przed konwersją kodu z index.html na .php
                $result1 = @$conn->query("SELECT COUNT(*) FROM aktualizacje");
                //print_r($result1->fetch_row()[0]);
                $_SESSION['akt'] = $result1->fetch_row()[0];
                //wuszukanie wszystkich danych z tabeli aktualizacje i ich wyświetlenie z formatowaniem css
                $result = @$conn->query("SELECT * FROM aktualizacje ORDER BY id DESC");
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div id="front-zwrot">
                        <b><i><?php echo $row['Nazwa'] ?></i></b>
                        <p><?php echo $row['Data'] ?></p>
                        <div style="clear: both"></div>
                        <p id="#"><?php echo $row['Opis'] ?></p>
                    </div>

            <?php
                }
                //zamknięcie połączenia
                $conn->close();
            }
            ?>
        </div>
    </div>
    <footer>Lorem ipsum</footer>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>