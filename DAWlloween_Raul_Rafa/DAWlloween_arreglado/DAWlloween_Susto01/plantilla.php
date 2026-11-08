<?php
// Pinta el principio de la página: el head, el menú y el título.
// $tabActiva dice qué pestaña del menú se marca como activa.
// Funciones para pintar lo que se repite en las páginas (cabecera, pie y avisos),
// así no tengo que copiar el mismo HTML en cada fichero.
// Usa la función h() de VarGlobales.php, por eso hay que incluir VarGlobales.php antes.
function cabecera($titulo = 'DAWlloween', $etiqueta = '', $h1 = '', $sub = '', $tabActiva = 'login') {
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= h($titulo) ?> · Toons de Pesadilla</title>
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
        <a class="tab <?= $tabActiva === 'inicio' ? 'activa' : '' ?>" href="index.html">Inicio</a>
        <a class="tab <?= $tabActiva === 'recetas' ? 'activa' : '' ?>" href="recetas.html">Recetas</a>
        <a class="tab <?= $tabActiva === 'juego' ? 'activa' : '' ?>" href="juego.html">Juego</a>
        <a class="tab <?= $tabActiva === 'aboutus' ? 'activa' : '' ?>" href="aboutus.html">Quiénes somos</a>
        <a class="tab" href="correo.php">Contacto</a>
        <a class="tab roja <?= $tabActiva === 'login' ? 'activa' : '' ?>" href="login.php">Login</a>
      </nav>
    </header>

    <main class="hoja">
      <?php if ($etiqueta): ?><span class="etiqueta"><?= h($etiqueta) ?></span><?php endif; ?>
      <?php if ($h1): ?><h1><?= h($h1) ?></h1><?php endif; ?>
      <?php if ($sub): ?><p class="sub"><?= h($sub) ?></p><?php endif; ?>
<?php
}
// Pinta el final de la página: cierra el contenido y pone el pie.
function pie() {
?>
    </main>
  </div>

  <footer class="pie-web">
    <span class="pie-titulo">TOONS DE PESADILLA · EXPEDIENTE Nº 13</span>
    <span>Proyecto DAWlloween · Atlántida Formación Profesional</span>
  </footer>
</body>
</html>
<?php
}
// Enseña un aviso solo si hay texto. Si el tipo es 'error' sale con el estilo de error y si no, con el de 'ok'.
function mensaje($tipo, $texto) {
    if (!empty($texto)) {
        $clase = ($tipo === 'error') ? 'error' : 'ok';
        echo '<div class="mensaje ' . $clase . '">' . h($texto) . '</div>';
    }
}
?>