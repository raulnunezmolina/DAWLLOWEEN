<?php
include 'VarGlobales.php';
exigirLogin();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recetas malditas · Toons de Pesadilla</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Source+Sans+3:wght@400;600;700&family=Special+Elite&display=swap">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<svg class="grano" aria-hidden="true"><filter id="grano"><feTurbulence type="fractalNoise" baseFrequency=".8" numOctaves="2" stitchTiles="stitch"/><feColorMatrix type="saturate" values="0"/></filter><rect width="100%" height="100%" filter="url(#grano)"/></svg>

  <div class="contenedor">
    <header>
      <p class="marca">ARCHIVO Nº 13 · TOONS DE PESADILLA</p>
      <nav class="pestanas" aria-label="Principal">
        <a class="tab" href="index.php">Inicio</a>
        <a class="tab activa" href="recetas.php" aria-current="page">Recetas</a>
        <a class="tab" href="juego.php">Juego</a>
        <a class="tab" href="aboutus.php">Quiénes somos</a>
        <a class="tab" href="correo.php">Contacto</a>
        <a class="tab roja" href="logout.php">Cerrar sesión</a>
      </nav>
    </header>

    <main class="hoja">
      <span class="etiqueta">SECCIÓN 2 · PRUEBAS INCAUTADAS</span>
      <h1>Recetas malditas</h1>
      <p class="sub">Catálogo de recetas de Halloween con pasos e ingredientes.</p>
      <div class="recetas-grid">
        <article class="ficha-receta top">
          <div class="sello-top">TOP SECRET</div>
          <div class="foto"><img src="img/cookie.jpg" alt="Galletas del Monstruo"></div>
          <div class="cuerpo">
            <span class="prueba">PRUEBA Nº 01</span>
            <h3>Galletas del Monstruo</h3>
            <p class="ingredientes">Harina, chips de chocolate y una cantidad preocupante de dientes.</p>
            <button class="boton pequeno btn-receta" type="button" aria-expanded="false" aria-controls="pasos-01">Ver receta</button>
          </div>
          <div class="pasos" id="pasos-01" hidden>
            <strong>Ingredientes</strong>
            <ul>
              <li>200 g de harina</li>
              <li>100 g de mantequilla blanda</li>
              <li>100 g de azúcar moreno</li>
              <li>150 g de chips de chocolate</li>
            </ul>
            <strong>Pasos</strong>
            <ol>
              <li>Bate la mantequilla con el azúcar.</li>
              <li>Añade la harina y hornea 12 minutos a 180ºC.</li>
            </ol>
          </div>
        </article>
        <article class="ficha-receta top">
          <div class="sello-top">TOP SECRET</div>
          <div class="foto"><img src="img/zombieOjo.jpg" alt="Galletas del Monstruo"></div>
          <div class="cuerpo">
            <span class="prueba">PRUEBA Nº 02</span>
            <h3>Ojos de zombie resacosos</h3>
            <p class="ingredientes">Huevos cocidos , mayonesa , mostaza , aceitunas negras , ketchup , pimienta y salsa picante.</p>
            <button class="boton pequeno btn-receta" type="button" aria-expanded="false" aria-controls="pasos-02">Ver receta</button>
          </div>
          <div class="pasos" id="pasos-02" hidden>
            <strong>Ingredientes</strong>
            <ul>
              <li>3 huevos cocidos.</li>
              <li>2 cucharadas de mayonesa.</li>
              <li>1 cucharadita de mostaza.</li>
              <li>6 aceitunas negras.</li>
              <li>Kétchup</li>
              <li>Un poquito de pimienta</li>
              <li>- Unas gotas de salsa picante.</li>
            </ul>
            <strong>Pasos</strong>
            <ol>
              <li>Cuece los huevos, pélalos y córtalos por la mitad.</li>
              <li>Saca las yemas y mézclalas con la mayonesa, la mostaza y la pimienta.</li>
              <li>Rellena los huecos de las claras con la mezcla.</li>
              <li>Coloca media aceituna negra en el centro de cada huevo para simular la pupila.</li>
              <li>Echa kétchup alrededor para crear el efecto de ojos inyectados en sangre.</li>
              <li>Añade unas gotas de salsa picante para darles ese aspecto de zombie resacoso.</li></ol>
          </div>
        </article>
        <article class="ficha-receta top">
          <div class="sello-top">TOP SECRET</div>
          <div class="foto"><img src="img/dedosBruja.jpg" alt="Galletas del Monstruo"></div>
          <div class="cuerpo">
            <span class="prueba">PRUEBA Nº 03</span>
            <h3>Dedos de bruja</h3>
            <p class="ingredientes">Harina, mantequilla , huevos , vainilla y almendras.</p>
            <button class="boton pequeno btn-receta" type="button" aria-expanded="false" aria-controls="pasos-03">Ver receta</button>
          </div>
          <div class="pasos" id="pasos-03" hidden>
            <strong>Ingredientes</strong>
            <ul>
              <li>250 g de harina</li>
              <li>125 g de mantequilla blanda</li>
              <li>100 g de azúcar</li>
              <li>1 huevo</li>
              <li>1 cucharadita de esencia de vainilla</li>
              <li>20 almendras enteras (para las uñas)</li>
              <li>Kétchup o mermelada de fresa (para simular sangre)</li>
            </ul>
            <strong>Pasos</strong>
            <ol>
              <li>Bate la mantequilla con el azúcar hasta conseguir una mezcla cremosa.</li>
              <li>Añade el huevo y la esencia de vainilla y mezcla bien.</li>
              <li>Incorpora la harina poco a poco hasta formar una masa.</li>
              <li>Forma tiras alargadas con la masa para crear los dedos.</li>
              <li>Marca los nudillos con un cuchillo y coloca una almendra en un extremo para hacer la uña.</li>
              <li>Hornea durante 15-20 minutos a 180 ºC.</li>
              <li>Deja enfriar y añade un poco de kétchup o mermelada en los extremos para simular sangre.</li>
            </ol>
          </div>
        </article>
      </div>
    </main>
  </div>

  <footer class="pie-web">
    <span class="pie-titulo">TOONS DE PESADILLA · EXPEDIENTE Nº 13</span>
    <span>Proyecto DAWlloween · Atlántida Formación Profesional</span>
  </footer>

  <script src="js/recetas.js"></script>
</body>
</html>