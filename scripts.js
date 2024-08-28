window.onload = () => {
  yearCounter()
  setInterval(console_control, 1000)
  console_control()
  setInterval(changeSlide, 5000)
  changeSlide()
}

function yearCounter(){
  const time = new Date()
  let footers = document.querySelector('#actualYear')
  footers.innerHTML = '&copy;'+ time.getFullYear()
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