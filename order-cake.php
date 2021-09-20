<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="utf-8" />
    <title>Zamówienie Tortu</title>
    <!--php odc 01, 15:38min-->
    <meta name="description" content="Zamów swoje ulubione delicje" />
    <meta
      name="keywords"
      content="ciasta, torty, i, wypieki, na, każdą, okazję"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css1/youtube.css" type="text/css" />
    <link rel="icon" href="icon.png" sizes="32x32" type="image/png" />
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
    <?php
      
    ?>
  </head>
  <body>
    <div class="up">
      <div id="logo" onclick="x()">
        <div id="a">
          <img src="img/logo.png" title="Logo" alt="Logo" />
        </div>
        <div id="eggs" class="row col-sm-6 invisible"></div>
      </div>
      <ol>
        <li>
          <a href="#">MENU &#9776;</a>
          <ul>
            <li>
              <a href="file:///D:/Wypiekarnia/index.html"
                >Strona Główna<i class="icon-globe"></i
              ></a>
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
    <!--<p>Określ pozycję liczby wegług osi liczbowej</p>
    <input type="text" placeholder="Wpisz Liczbę" id="pole" />
    <input type="submit" value="Sprawdź" onclick="sprawdz()" />
    <div id="wynik"></div>
    <p>Zobacz jakie liczby są w przedziale liczb które wybrałeś</h1><br>
    <input type="text" placeholder="Wpisz Liczbę Mniejszą" id="pole1" />
    <input type="text" placeholder="Wpisz Liczbę Większą" id="pole2" />
    <input type="submit" value="Pokaż" onclick="wypisz()" />
    <div id="linia"></div>-->
    <div class="main1">
      <form action="order.php" method="post" enctype="multipart/form-data">
        <!-- <div class="row">
          <fieldset>
            <legend>Wybierz Produkt:</legend>

            <div>
              <label><input type="radio" value="1" name="tort" />Tort</label>
            </div>
            <div>
              <label
                ><input type="radio" value="2" name="ciasto" />Ciasto</label
              >
            </div>
            <div>
              <label><input type="radio" value="3" name="tarta" />Tarta</label>
            </div>
            <div>
              <label
                ><input type="radio" value="4" name="babeczka" />Babeczka</label
              >
            </div>
            <div>
              <label
                ><input
                  type="radio"
                  value="5"
                  name="Ciasteczko"
                />Ciasteczko</label
              >
            </div>
            <div>
              <label
                ><input type="radio" value="6" name="bułeczka" />Bułeczka</label
              >
            </div>
          </fieldset>
        </div>-->

        <!--<div class="row">
          <label for="silnik">Wybierz Smak:</label>
          <select>
            <option value="k">Kakaowy</option>
            <option value="k">Kakaowy</option>
          </select>
        </div>-->

        <div class="row">
          <fieldset>
            <legend>Dodatki:</legend>
            <div class="col">
              <div>
                <label
                  ><input
                    type="checkbox"
                    name="dod[]"
                    value="1"
                    disabled
                    checked
                  />Zapakowany</label
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
                  />W Eko Torebce</label
                >
              </div>
              <div>
                <label
                  ><input type="checkbox" name="dod[]" value="3" />Posypka
                  Czekoladowa</label
                >
                <div>
                  <label
                    ><input type="checkbox" name="dod[]" value="4" />Posypka
                    Cukrowa</label
                  >
                </div>
              </div>
              <div>
                <label
                  ><input type="checkbox" name="dod[]" value="5" />Owoce na
                  wieszhu</label
                >
              </div>
            </div>
          </fieldset>
        </div>

        <!--<div class="row">
				<label for="choinka">Choinki Zapachowe:</label>
				
				<div style="margin-top:10px;">
					<select id="chionka" name="choinka[]" multiple size="4">
				
						<option value="k">Kokosowa</option>
						<option value="c" selected>Cytrynowa</option>
						<option value="t">Truskawkowa</option>
						<option value="b">Brzoskwiniowa</option>
					
					</select>
				</div>-->
        <!--
			<div class="row">
				<div><label>Imię: <input type="text" name="imie" placeholder="Jak masz na imię?"></label></div>
				<div><label>Hasło: <input type="password" name="haslo" placeholder="Wpisz Hasło"></label></div>
				<div><label>Szukaj: <input type="search" name="fraza" placeholder="Wyszukaj"></label></div>
			</div>
			-->
        <div class="row">
          <label
            >Ilość kluczyków:<input type="number" name="kluczyk" step="1"
          /></label>
        </div>

        <div class="row">
          <label
            >Adres Email:<input
              type="email"
              placeholder="example@gmail.com"
              name="adres"
              required /></label
          ><br /><br />
          <label
            >Numer Telefonu:<input type="tel" name="telefon" required
          /></label>
        </div>

        <div class="row">
          <label>Data dostawy:<input type="date" name="data" /></label
          ><br /><br />
          <label
            >Czas dostawy:<input
              type="time"
              name="czas"
              min="09:00"
              max="18:00"
          /></label>
        </div>

        <div class="row">
          <div><label for="komentarz">Uwagi do zamówienia:</label></div>
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
      </form>
    </div>
    <footer>Lorem ipsum</footer>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
