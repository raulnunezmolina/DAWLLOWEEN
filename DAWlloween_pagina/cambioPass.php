<?php
include 'VarGlobales.php';
include 'plantilla.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario   = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $respuesta = isset($_POST['respuesta']) ? $_POST['respuesta'] : '';
    $nueva     = isset($_POST['nueva']) ? $_POST['nueva'] : '';

    $error = cambioContraseña($usuario, $respuesta, $nueva);

    if ($error === '') {
        redirect('login.php?pass=1');
    }
}

cabecera('Recuperar Contraseña', 'SECCIÓN 5 · ACCESO', 'Recuperar Contraseña', 'Escribe tu palabra secreta para establecer una nueva contraseña.', 'login');
mensaje('error', $error);
?>
<form class="formulario" method="post" action="cambioPass.php">
    <label>Usuario
        <input type="text" name="usuario" autocomplete="username" required
               value="<?php echo isset($_POST['usuario']) ? h($_POST['usuario']) : ''; ?>" placeholder="Tu usuario">
    </label>
    <label>Palabra Secreta
        <input type="text" name="respuesta" required placeholder="Tu palabra secreta elegida al registrarte">
    </label>
    <label>Nueva Contraseña
        <input type="password" name="nueva" autocomplete="new-password" required placeholder="Tu nueva contraseña">
    </label>
    <button class="boton" type="submit">Restablecer Contraseña</button>
</form>
<p class="enlaces-form">
    <a href="login.php">Volver a Login</a>
</p>
<?php
pie();
?>