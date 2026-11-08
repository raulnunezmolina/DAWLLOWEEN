<?php
// Página de login. Es el formulario y a la vez donde llegan los datos (POST).
// Incluyo VarGlobales.php para la matriz y las funciones, y plantilla.php para la cabecera y el pie.
include 'VarGlobales.php';
include 'plantilla.php';

// Aquí guardo los mensajes que luego se enseñan al usuario.
$error = '';
$aviso = '';

// Avisos que llegan por la URL cuando vengo de registrarme o de cambiar la contraseña.
if (isset($_GET['alta'])) {
    $aviso = 'Usuario creado con éxito. Ya puedes iniciar sesión.';
}
if (isset($_GET['pass'])) {
    $aviso = 'Contraseña cambiada correctamente. Ya puedes iniciar sesión.';
}

// Esto solo se hace cuando se ha enviado el formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario    = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    if ($usuario === '' || $contrasena === '') {
        $error = 'Escribe tu usuario y contraseña.';
    } else {
        // Busco el usuario y compruebo la contraseña con password_verify.
        // Si está bien, lo guardo con currentUser y voy al panel. Si no, aviso del error.
        $posicion = buscarUsuario($usuario);
        if ($posicion !== -1 && password_verify($contrasena, $_SESSION['mimatriz'][$posicion]['Contraseña'])) {
            currentUser($posicion);
            redirect('panel.php');
        } else {
            $error = 'El usuario o la contraseña son incorrectos.';
        }
    }
}

// Si ya había iniciado sesión no hace falta el login, lo mando al panel.
if (usuarioLogueado() !== null) {
    redirect('panel.php');
}

// Pinto la cabecera de la página y los avisos.
cabecera('Login', 'SECCIÓN 5 · ACCESO', 'Iniciar Sesión (Login)', 'Identifícate para acceder al expediente privado.', 'login');
mensaje('error', $error);
mensaje('ok', $aviso);
?>
<form class="formulario" method="post" action="login.php">
    <label>Usuario
        <input type="text" name="usuario" autocomplete="username" required
               value="<?php echo isset($_POST['usuario']) ? h($_POST['usuario']) : ''; ?>" placeholder="Ej: admin o usuario">
    </label>
    <label>Contraseña
        <input type="password" name="contrasena" autocomplete="current-password" required placeholder="Tu contraseña">
    </label>
    <button class="boton" type="submit">Login</button>
</form>
<p class="enlaces-form">
    <a href="altaUsuario.php">Registrar nuevo usuario</a>
    <a href="cambioPass.php">¿Olvidaste tu contraseña?</a>
</p>
<?php
pie();
?>