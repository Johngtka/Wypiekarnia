<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="utf-8" />
    <title>Edycja Zamówienia</title>
    <!--php odc 01, 42:23min-->
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
                >Strona Główna<i class="icon-home"></i></a>
            </li>
            <li>
              <a href="#">Kontakt<i class="icon-phone-squared"></i></a>
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
      <form action="1.php" method="POST">
        <div class="row">
				<legend><b>Rodzaj Tortu:</b></legend>
				<div style="margin-top:10px;">
          <label><input type="checkbox" name="urodzinowy" value="1"><b>Urodzinowy(50zł/Kg)</label></b></br>
          <label><input type="checkbox" name="smakosz" value="2"><b>Dla Smakoszy(20zł/Kg)</label></b></br>
          <label><input type="checkbox" name="jubileuszowy" value="3"><b>Jubileuszowy(30zł/Kg)</label></b></br>
          <label><input type="checkbox" name="slubny" value="4"><b>Ślubny(40zł/Kg)</b></label>
          <!--<label><input list="browsers" name="browser" placeholder="Wybierz rodzaj" required/>
          <datalist id="browsers">
            <option value="Urodzinowy(50zł/Kg)">
            <option value="Dla smakoszy(20zł/Kg)">
            <option value="Jubileuszowy(30zł/Kg)">
            <option value="Ślubny(40zł/Kg)">
          </datalist></label>-->
        </label>
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
                  Czekoladowa</b></label
                >
                <div>
                  <label
                    ><input type="checkbox" name="dod[]" value="4" /><b>Posypka
                    Cukrowa</b></label
                  >
                </div>
              </div>
              <div>
                <label
                  ><input type="checkbox" name="dod[]" value="5" /><b>Owoce na
                  wieszhu</b></label
                >
              </div>
            </div>
          </fieldset>
        </div>
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
