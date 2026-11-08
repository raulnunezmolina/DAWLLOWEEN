var tumbas = document.querySelectorAll('.tumba');
var puntosEl = document.getElementById('puntos');
var tiempoEl = document.getElementById('tiempo');
var cajaTiempo = document.getElementById('cajaTiempo');
var panelInicio = document.getElementById('panelInicio');
var panelFin = document.getElementById('panelFin');
var puntosFinal = document.getElementById('puntosFinal');
var btnJugar = document.getElementById('btnJugar');
var btnOtra = document.getElementById('btnOtra');
var btnSonido = document.getElementById('btnSonido');

var TIEMPO_INICIAL = 30;
var TIEMPO_EXTRA = 3;
var TIEMPO_PERDIDO = 3;

var puntos = 0;
var tiempo = TIEMPO_INICIAL;
var jugando = false;
var sonidoOn = true;
var audio = null;
var relojTimer = null;
var personajesTimer = null;

function pitido(frecuencia) {
  if (!sonidoOn) return;
  if (audio === null) audio = new AudioContext();
  var osc = audio.createOscillator();
  osc.frequency.value = frecuencia;
  osc.connect(audio.destination);
  osc.start();
  osc.stop(audio.currentTime + 0.15);
}

function actualizarTiempo() {
  if (tiempo < 0) {
    tiempo = 0;
  }
  tiempoEl.textContent = tiempo;

  if (tiempo <= 5) {
    cajaTiempo.classList.add('poco');
  } else {
    cajaTiempo.classList.remove('poco');
  }

  if (tiempo === 0) {
    terminar();
  }
}

function aparecer() {
  var i = Math.floor(Math.random() * tumbas.length);
  var tumba = tumbas[i];

  if (tumba.classList.contains('arriba')) {
    return;
  }

  var suerte = Math.random();

  if (suerte < 0.2) {
    tumba.dataset.tipo = 'murcielago';
    tumba.querySelector('use').setAttribute('href', '#p-murcielago');
    tumba.classList.add('aviso');
  } else if (suerte < 0.32) {
    tumba.dataset.tipo = 'dorado';
    tumba.querySelector('use').setAttribute('href', '#p-dorado');
  } else {
    tumba.dataset.tipo = 'fantasma';
    tumba.querySelector('use').setAttribute('href', '#p-fantasma');
  }
  tumba.classList.add('arriba');

  setTimeout(function () {
    esconder(tumba);
  }, 900);
}

function esconder(tumba) {
  tumba.classList.remove('arriba');
  tumba.classList.remove('aviso');
}

function golpear(tumba) {
  if (!jugando || !tumba.classList.contains('arriba')) {
    return;
  }

  var tipo = tumba.dataset.tipo;
  esconder(tumba);

  if (tipo === 'murcielago') {
    tiempo = tiempo - TIEMPO_PERDIDO;
    pitido(150);
  } else if (tipo === 'dorado') {
    tiempo = tiempo + TIEMPO_EXTRA;
    pitido(900);
  } else {
    puntos = puntos + 1;
    puntosEl.textContent = puntos;
    pitido(600);
  }

  actualizarTiempo();
}

function pasarSegundo() {
  tiempo = tiempo - 1;
  actualizarTiempo();
}

function empezar() {
  puntos = 0;
  tiempo = TIEMPO_INICIAL;
  jugando = true;
  puntosEl.textContent = puntos;
  actualizarTiempo();
  panelInicio.hidden = true;
  panelFin.hidden = true;

  relojTimer = setInterval(pasarSegundo, 1000);
  personajesTimer = setInterval(aparecer, 700);
}

function terminar() {
  jugando = false;
  clearInterval(relojTimer);
  clearInterval(personajesTimer);

  for (var i = 0; i < tumbas.length; i++) {
    esconder(tumbas[i]);
  }

  puntosFinal.textContent = puntos;
  panelFin.hidden = false;
}

btnJugar.addEventListener('click', empezar);
btnOtra.addEventListener('click', empezar);

for (var i = 0; i < tumbas.length; i++) {
  tumbas[i].addEventListener('click', function () {
    golpear(this);
  });
}

btnSonido.addEventListener('click', function () {
  sonidoOn = !sonidoOn;
  btnSonido.textContent = 'Sonido: ' + (sonidoOn ? 'sí' : 'no');
});
