<?php
include 'VarGlobales.php';
include 'plantilla.php';

exigirLogin();
$usuario = usuarioLogueado();

cabecera('Panel de Usuario', 'SECCIÓN 5 · ACCESO', 'Bienvenido, ' . $usuario['Usuario'], 'Acceso concedido al área privada de Toons de Pesadilla.', 'login');
?>
<nav class="panel-menu" aria-label="Funciones de la web">
    <a href="juego.php">Aplasta Fantasmas<small>Minijuego avanzado de 30 segundos.</small></a>
    <a href="recetas.php">Recetas Malditas<small>Catálogo de pruebas gastronómicas.</small></a>
    <a href="correo.php">Escribir Mensaje<small>Envía un mensaje al archivo.</small></a>
    <a href="aboutus.php">Quiénes Somos<small>Conoce al equipo creador.</small></a>
    <a href="logout.php">Cerrar Sesión<small>Salir del área privada.</small></a>
</nav>
<?php
pie();
?>