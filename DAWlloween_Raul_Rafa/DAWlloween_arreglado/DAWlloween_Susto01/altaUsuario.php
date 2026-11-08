<?php
// Página para registrar un usuario nuevo.
// Incluyo VarGlobales.php para usar la matriz y la función AltaUsuario.
include 'VarGlobales.php';
include 'plantilla.php';

// Aquí guardo el error que se enseña si algo falla.
$error = '';

// Recojo los datos del formulario (si algún campo no llega, lo dejo vacío).
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario    = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
    $email      = isset($_POST['email']) ? $_POST['email'] : '';
    $respuesta  = isset($_POST['respuesta']) ? $_POST['respuesta'] : '';

    // AltaUsuario (de VarGlobales.php) valida los datos y los guarda. Devuelve el error o ''.
    $error = AltaUsuario($usuario, $contrasena, $email, $respuesta);

    // Si no hay error, vuelvo al login con un aviso para que entre con su usuario nuevo.
    if ($error === '') {
        redirect('login.php?alta=1');
    }
}

// Pinto la cabecera y el error si lo hay.
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
        <input type="password" name="contrasena" autocomplete="new-password" required minlength="6" placeholder="Tu contraseña">
        <span class="ayuda">Mínimo 6 caracteres.</span>
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