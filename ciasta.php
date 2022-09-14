<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="utf-8" />
    <title>Edycja Zamówienia</title>
    <meta name="description" content="Zamów swoje ulubione delicje" />
    <meta
      name="keywords"
      content="ciasta, torty, i, wypieki, na, każdą, okazję"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="icon" href="icon.png" sizes="32x32" type="image/png" />
    <link rel="stylesheet" href="css1/font.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="scripts.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!--Font section-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&display=swap"
      rel="stylesheet"
    />
    <!--And of section-->
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
              <a href="http://localhost/Wypiekarnia/"
                >Strona Główna<!--<i class="icon-home"></i>--> &#10224;</a>
            </li>
            <li>
              <a href="http://localhost/Wypiekarnia/kontakt.php">Kontakt<i class="icon-phone-squared"></i></a>
            </li>
            <li>
              <a href="#">Aktualizacje &#9781;</a>
            </li>
          </ul>
        </li>
      </ol>
      <div style="clear: both"></div>
    </div>
    <div class="main1">
      <form action="2.php" method="POST">
        <div class="row">
				<legend><b>Rodzaj Ciasta:</b></legend>
        <div style="margin-top:10px;">
          <label><input type="checkbox" name="drozdzowe" value="1"><b>Drożdżowe(15zł/Kg)</label></b></br>
          <label><input type="checkbox" name="sernik" value="2"><b>Sernik(20zł/Kg)</label></b></br>
          <label><input type="checkbox" name="brown" value="3"><b>Brown'e(25zł/Kg)</label></b></br>
          <label><input type="checkbox" name="dziec" value="4"><b>Dziecięce(30zł/Kg)</b></label>
          <!--<label>
          <input list="browsers" name="browser" placeholder="Wybierz rodzaj" required/>
          <datalist id="browsers">
            <option value="Drożdżowe(15zł/Kg)">
            <option value="Sernik(20zł/Kg)">
            <option value="Brown'e(25zł/Kg)">
            <option value="Dziecięce(30zł/Kg)">
          </datalist>
        </label>-->
        </div>
        <div class="row">
          <fieldset>
            <legend><b>Dodatki:</b></legend>
            <div class="col">
              <div>
                <label
                  ><input
                    type="checkbox"
                    name="dod[]"
                    value="1"
                    disabled
                    checked
                  /><b>Zapakowany</b></label
                >
              </div>
              <div>
                <label
                  ><input
                    type="checkbox"
                    name="dod[]"
                    value="2"
                    disabled
                    checked
                  /><b>W Eko Torebce</b></label
                >
              </div>
              <div>
                <label
                  ><input type="checkbox" name="dod[]" value="3" /><b>Posypka
                  Kruszonka</b></label
                >
                <div>
                  <label
                    ><input type="checkbox" name="dod[]" value="4" /><b>Brak Kruszonki</b></label
                  >
                </div>
            </div>
          </fieldset>
        </div>
        <!--
			<div class="row">
				<div><label>Imię: <input type="text" name="imie" placeholder="Jak masz na imię?"></label></div>
				<div><label>Hasło: <input type="password" name="haslo" placeholder="Wpisz Hasło"></label></div>
				<div><label>Szukaj: <input type="search" name="fraza" placeholder="Wyszukaj"></label></div>
			</div>
			-->
        <div class="row">
          <label
            ><b>Ilość:</b><input type="number" placeholder="..." name="i" step="1"
          /></label>
        </div>

        <div class="row">
          <label
            ><b>Adres Email:</b><input
              type="email"
              placeholder="example@gmail.com"
              name="adres"
              required /></label
          ><br /><br />
          <label
            ><b>Numer Telefonu:</b><input type="tel" name="telefon" required
          /></label>
        </div>

        <div class="row">
          <label><b>Data dostawy:</b><input type="date" name="data" /></label
          ><br /><br />
          <label
            ><b>Czas dostawy:</b><input
              type="time"
              name="czas"
              min="10:00"
              max="23:00"
          /></label>
        </div>

        <div class="row">
          <div><label><b>Uwagi do zamówienia:</b></label></div>
          <textarea
            name="komentarz"
            id="komentarz"
            rows="5"
            cols="80"
          ></textarea>
        </div>
        <div class="row">
          <input type="submit" value="Zamów!" />
        </div>
        <div class="row">
        <input type="reset" value="Wyczyść"/>
        </div>
      </form>
    </div>
    <footer>Lorem ipsum</footer>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
