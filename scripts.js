function zegarek() {
  var dzisiaj = new Date();

  var dzien = dzisiaj.getDate();
  var miesiac = dzisiaj.getMonth() + 1;
  var rok = dzisiaj.getFullYear();
  var godzina = (dzisiaj.getHours() < 10 ? "0" : "") + dzisiaj.getHours();
  var minuta = (dzisiaj.getMinutes() < 10 ? "0" : "") + dzisiaj.getMinutes();
  var sekunda = (dzisiaj.getSeconds() < 10 ? "0" : "") + dzisiaj.getSeconds();
  document.getElementById("eggs").innerHTML =
    dzien +
    "/" +
    miesiac +
    "/" +
    rok +
    "|" +
    godzina +
    ":" +
    minuta +
    ":" +
    sekunda;
}

var timerTask = null;

function x() {
  const logo = document.getElementById("a");
  const timer = document.getElementById("eggs");
  if (logo.classList.toggle("invisible")) {
    zegarek();
    timerTask = setInterval(zegarek, 1000);
  } else if (timerTask) {
    clearInterval(timerTask);
    timerTask = null;
  }
  timer.classList.toggle("invisible");
}

var numer = Math.floor(Math.random() * 6) + 1;

var timer1 = 0;
var timer2 = 0;
function schowaj() {
  $("#slider").fadeOut(500);
}

function zmienslajd() {
  numer++;
  if (numer > 6) numer = 1;

  var plik = '<a href="#"><img class="img-fluid" src="slajdy/slajd' + numer + '.png" /></a>';

  document.querySelector('#slider').innerHTML = plik;
  $("#slider").fadeIn(500);

  timer1 = setTimeout("zmienslajd()", 5000);
  timer2 = setTimeout("schowaj()", 4500);
}