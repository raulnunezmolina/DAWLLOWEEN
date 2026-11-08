<?php
include 'VarGlobales.php';
include 'plantilla.php';

$error = '';
$aviso = '';

if (isset($_GET['alta'])) {
    $aviso = 'Usuario creado con éxito. Ya puedes iniciar sesión.';
}
if (isset($_GET['pass'])) {
    $aviso = 'Contraseña cambiada correctamente. Ya puedes iniciar sesión.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario    = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    if ($usuario === '' || $contrasena === '') {
        $error = 'Escribe tu usuario y contraseña.';
    } else {
        $posicion = buscarUsuario($usuario);
        if ($posicion !== -1 && password_verify($contrasena, $_SESSION['mimatriz'][$posicion]['Contraseña'])) {
            currentUser($posicion);
            redirect('index.php');
        } else {
            $error = 'El usuario o la contraseña son incorrectos.';
        }
    }
}

if (usuarioLogueado() !== null) {
    redirect('index.php');
}

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