<?php
// Panel del usuario logueado, con un menú a las funciones de la web.
// Es la pantalla a la que se llega después de hacer login.
include 'VarGlobales.php';
include 'plantilla.php';

// Si no hay nadie logueado, lo mando al login.
exigirLogin();
// Cojo los datos del usuario para saludarle por su nombre.
$usuario = usuarioLogueado();

cabecera('Panel de Usuario', 'SECCIÓN 5 · ACCESO', 'Bienvenido, ' . $usuario['Usuario'], 'Acceso concedido al área privada de Toons de Pesadilla.', 'login');
?>
<nav class="panel-menu" aria-label="Funciones de la web">
    <a href="juego.html">Aplasta Fantasmas<small>Minijuego avanzado de 30 segundos.</small></a>
    <a href="recetas.html">Recetas Malditas<small>Catálogo de pruebas gastronómicas.</small></a>
    <a href="correo.php">Escribir Mensaje<small>Envía un mensaje al archivo.</small></a>
    <a href="aboutus.html">Quiénes Somos<small>Conoce al equipo creador.</small></a>
    <a href="logout.php">Cerrar Sesión<small>Salir del área privada.</small></a>
</nav>
<?php
pie();
?>