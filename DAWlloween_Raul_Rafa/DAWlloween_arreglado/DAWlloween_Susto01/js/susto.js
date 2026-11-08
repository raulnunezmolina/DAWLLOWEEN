var sonidoOn = true;
var sustosOn = true;
var susto = document.createElement('div');
susto.className = 'susto';
susto.hidden = true;
susto.innerHTML = '<div class="susto-tiembla">' +
  '<img src="img/susto3.png" alt="" style="width:100%;height:100%;object-fit:cover;transform:scale(1.05)">' +
  '</div><div class="susto-vineta"></div>';
document.body.appendChild(susto);
function gritar() {
  if (!sonidoOn) return;
  var grito = new Audio('audio/grito.mp3');
  grito.play();
}
function lanzarSusto() {
  if (sustosOn) {
    susto.hidden = false;
    gritar();
    setTimeout(function () { susto.hidden = true; }, 2000);
  }
  setTimeout(lanzarSusto, 15000 + Math.random() * 25000);
}

var btnSonido = document.getElementById('btnSonidoSusto');
var btnSustos = document.getElementById('btnSustos');
btnSonido.addEventListener('click', function () {
  sonidoOn = !sonidoOn;
  btnSonido.textContent = 'Sonido: ' + (sonidoOn ? 'activado' : 'desactivado');
});
btnSustos.addEventListener('click', function () {
  sustosOn = !sustosOn;
  btnSustos.textContent = 'Sustos: ' + (sustosOn ? 'activados' : 'desactivados');
});
document.addEventListener('click', function () {
  setTimeout(lanzarSusto, 5000);
}, { once: true });