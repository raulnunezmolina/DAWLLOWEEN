<?php
include 'VarGlobales.php';
include 'plantilla.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario    = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
    $email      = isset($_POST['email']) ? $_POST['email'] : '';
    $respuesta  = isset($_POST['respuesta']) ? $_POST['respuesta'] : '';

    $error = AltaUsuario($usuario, $contrasena, $email, $respuesta);

    if ($error === '') {
        $posicion = buscarUsuario($usuario);
        currentUser($posicion);
        redirect('index.php');
    }
}

cabecera('Registro', 'SECCIÓN 5 · ACCESO', 'Registro de Usuario', 'Crea tu usuario indicando tu palabra secreta.', 'login');
mensaje('error', $error);
?>
<form class="formulario" method="post" action="altaUsuario.php">
    <label>Usuario
        <input type="text" name="usuario" autocomplete="username" required
               value="<?php echo isset($_POST['usuario']) ? h($_POST['usuario']) : ''; ?>" placeholder="Tu nombre de usuario">
        <span class="ayuda">De 3 a 20 caracteres.</span>
    </label>
    <label>Contraseña
        <input type="password" name="contrasena" autocomplete="new-password" required placeholder="Tu contraseña">
        <span class="ayuda">Mínimo 4 caracteres.</span>
    </label>
    <label>Correo electrónico
        <input type="email" name="email" autocomplete="email" required
               value="<?php echo isset($_POST['email']) ? h($_POST['email']) : ''; ?>" placeholder="tu@correo.com">
    </label>
    <label><?php echo h(PREGUNTA_SEGURIDAD); ?>
        <input type="text" name="respuesta" required placeholder="Ej: perro, murciélago...">
        <span class="ayuda">Palabra secreta requerida para recuperar la contraseña si la olvidas.</span>
    </label>
    <button class="boton" type="submit">Registrarse</button>
</form>
<p class="enlaces-form">
    <a href="login.php">Volver a Login</a>
</p>
<?php
pie();
?>