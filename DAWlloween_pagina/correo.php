
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'VarGlobales.php';
exigirLogin();
include 'plantilla.php';

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mensajeEnviado = '';

// Obtenemos los datos del usuario conectado
$usuarioLogueado = usuarioLogueado();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

    // Datos del usuario que ha iniciado sesión
    $nombre = $usuarioLogueado['Usuario'];
    $correoUsuario = $usuarioLogueado['Email'];

    if ($mensaje !== '' && filter_var($correoUsuario, FILTER_VALIDATE_EMAIL)) {

        $correo = new PHPMailer(true);

        try {
            $correo->isSMTP();
            $correo->SMTPDebug = 0;
            $correo->Host = 'smtp-relay.brevo.com';
            $correo->SMTPAuth = true;

            $correo->Username = 'c17dcf001@smtp-brevo.com';
            $correo->Password = 'CLAVE SSH';

            $correo->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $correo->Port = 587;
            $correo->Timeout = 20;

            $correo->CharSet = 'UTF-8';

            // Remitente verificado de Brevo
            $correo->setFrom('raulnm242@gmail.com', 'DAWlloween');

            // Correo del usuario conectado
            $correo->addReplyTo($correoUsuario, $nombre);

            $correo->addAddress('skeletonjack@tempr.email');

            $correo->Subject = 'Nuevo mensaje de DAWlloween';

            $correo->Body =
                "Usuario: " . $nombre . "\n" .
                "Correo del usuario: " . $correoUsuario . "\n\n" .
                "Mensaje:\n" . $mensaje;

            $correo->send();

            $mensajeEnviado = "Gracias, $nombre. Tu mensaje ha sido registrado en el expediente.";

        } catch (Throwable $e) {

            $mensajeEnviado = 'No se ha podido enviar el mensaje. Inténtalo de nuevo.';

        }

    } else {

        $mensajeEnviado = 'Debes escribir un mensaje y tener un correo válido en tu cuenta.';

    }
}

cabecera(
    'Contacto',
    'SECCIÓN 6 · CORREO',
    'Escribir a Jack',
    'Envía tu mensaje o sugerencia al expediente de pesadilla.',
    'login'
);

mensaje('ok', $mensajeEnviado);
?>

<form class="formulario" method="post" action="correo.php">

    <label>Tu Mensaje
        <textarea name="mensaje" required placeholder="Escribe aquí tu mensaje o pesadilla..."></textarea>
    </label>

    <button class="boton" type="submit">Enviar Mensaje</button>

</form>

<?php
pie();
?>
