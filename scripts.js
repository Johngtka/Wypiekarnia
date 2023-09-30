window.onload = () => {
  yearCounter()
  setInterval(console_control, 1000)
  console_control()
  setInterval(changeSlide, 5000)
  changeSlide()
}

function timerScope() {
  const time = new Date()
  let day = time.getDate()
  let month = time.getMonth() + 1
  let year = time.getFullYear()
  let hour = time.getHours()
  let minute = time.getMinutes()
  let second = time.getSeconds()
  if (month < 10) {
    month = '0' + month
  }
  if (hour < 10) {
    hour = '0' + hour
  }
  if (minute < 10) {
    minute = '0' + minute
  }
  if (second < 10) {
    second = '0' + second
  }
  document.querySelector('#eggs').innerHTML = day + '.' + month + '.' + year + ' | ' + hour + ':' + minute + ':' + second
}

function yearCounter(){
  const time = new Date()
  let footers = document.querySelector('#actualYear')
  footers.innerHTML = '&copy;'+ time.getFullYear()
}

function showTimerWithDate() {
  const logo = document.querySelector('#a')
  const timer = document.querySelector('#eggs')
  let timerTask = null
  if (logo.classList.toggle('invisible')) {
    timerScope()
    timerTask = setInterval(timerScope, 1000)
  } else if (timerTask) {
    clearInterval(timerTask)
    timerTask = null
  }
  timer.classList.toggle('invisible')
}

let numer = Math.floor(Math.random() * 6) + 1

function hide() {
  $('#slider').fadeOut(500)
}

function changeSlide() {
  numer++
  if (numer > 6) numer = 1

  var plik = '<img src="slajdy/slajd' + numer + '.png" />'

  document.querySelector('#slider').innerHTML = plik
  $('#slider').fadeIn(500)
  setTimeout(hide, 4500)
}

function console_control() {
  console.clear()
}