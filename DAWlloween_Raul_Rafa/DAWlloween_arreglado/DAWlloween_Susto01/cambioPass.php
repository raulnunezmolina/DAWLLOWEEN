<?php
// Página para cambiar la contraseña.
// Pide el usuario, la palabra secreta y la contraseña nueva. Usa la función cambioContraseña de VarGlobales.php.
include 'VarGlobales.php';
include 'plantilla.php';

// Aquí guardo el error que se enseña si algo falla.
$error = '';

// Recojo los datos del formulario (si algún campo no llega, lo dejo vacío).
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario   = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $respuesta = isset($_POST['respuesta']) ? $_POST['respuesta'] : '';
    $nueva     = isset($_POST['nueva']) ? $_POST['nueva'] : '';

    // Esta función comprueba la palabra secreta y cambia la contraseña. Devuelve el error o ''.
    $error = cambioContraseña($usuario, $respuesta, $nueva);

    // Si ha ido bien, vuelvo al login con un aviso.
    if ($error === '') {
        redirect('login.php?pass=1');
    }
}

// Pinto la cabecera y el error si lo hay.
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
        <input type="password" name="nueva" autocomplete="new-password" required minlength="6" placeholder="Tu nueva contraseña">
        <span class="ayuda">Mínimo 6 caracteres.</span>
    </label>
    <button class="boton" type="submit">Restablecer Contraseña</button>
</form>
<p class="enlaces-form">
    <a href="login.php">Volver a Login</a>
</p>
<?php
pie();
?>