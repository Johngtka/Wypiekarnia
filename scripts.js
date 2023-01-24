window.onload = () => {
  setInterval(console_control, 1000)
  console_control()
  setInterval(zmienslajd, 5000)
  zmienslajd()
}

function zegarek() {
  const dzisiaj = new Date()
  let dzien = dzisiaj.getDate()
  let miesiac = dzisiaj.getMonth() + 1
  let rok = dzisiaj.getFullYear()
  let godzina = dzisiaj.getHours()
  let minuta = dzisiaj.getMinutes()
  let sekunda = dzisiaj.getSeconds()
  if (miesiac < 10) {
    miesiac = '0' + miesiac
  }
  if (godzina < 10) {
    godzina = '0' + godzina
  }
  if (minuta < 10) {
    minuta = '0' + minuta
  }
  if (sekunda < 10) {
    sekunda = '0' + sekunda
  }
  document.querySelector('#eggs').innerHTML = dzien + '/' + miesiac + '/' + rok + '|' + godzina + ':' + minuta + ':' + sekunda
}

let timerTask = null
function x() {
  const logo = document.querySelector('#a')
  const timer = document.querySelector('#eggs')
  if (logo.classList.toggle('invisible')) {
    zegarek()
    timerTask = setInterval(zegarek, 1000)
  } else if (timerTask) {
    clearInterval(timerTask)
    timerTask = null
  }
  timer.classList.toggle('invisible')
}

let numer = Math.floor(Math.random() * 6) + 1
function schowaj() {
  $('#slider').fadeOut(500)
}

function zmienslajd() {
  numer++
  if (numer > 6) numer = 1

  var plik = '<img src="slajdy/slajd' + numer + '.png" />'

  document.querySelector('#slider').innerHTML = plik
  $('#slider').fadeIn(500)
  setTimeout(schowaj, 4500)
}

function console_control() {
  console.clear()
}