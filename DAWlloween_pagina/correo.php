<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'VarGlobales.php';
exigirLogin();
include 'plantilla.php';

// Cargamos PHPMailer
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

$mensajeEnviado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

    if ($nombre !== '' && $mensaje !== '') {

        $correo = new PHPMailer(true);

        try {
            $correo->isSMTP();
            $correo->SMTPDebug = 0; 
            $correo->Host = 'smtp-relay.brevo.com';
            $correo->SMTPAuth = true;

            $correo->Username = 'c17dcf001@smtp-brevo.com';
            $correo->Password = 'xsmtpsib-7efd7ea5c2e73a4fdef7948fde94c09a67abeeed9c36a7253c189abf86da3a1b-m7AEcyBAcCWVinlT';

            $correo->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $correo->Port = 587;
            $correo->Timeout = 20;

            $correo->CharSet = 'UTF-8';

            $correo->setFrom('raulnm242@gmail.com', 'DAWlloween');

            $correo->addAddress('skeletonjack@tempr.email');

            $correo->Subject = 'Nuevo mensaje de DAWlloween';

            $correo->Body =
                "Nombre: " . $nombre . "\n\n" .
                "Mensaje:\n" . $mensaje;

            $correo->send();

            $mensajeEnviado = "Gracias, $nombre. Tu mensaje ha sido registrado en el expediente.";

        } catch (Throwable $e) {

            $mensajeEnviado = 'No se ha podido enviar el mensaje. Inténtalo de nuevo.';

        }

    } else {

        $mensajeEnviado = 'Debes rellenar todos los campos.';

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

    <label>Tu Nombre
        <input type="text" name="nombre" required placeholder="Tu nombre">
    </label>

    <label>Tu Mensaje
        <textarea name="mensaje" required placeholder="Escribe aquí tu mensaje o pesadilla..."></textarea>
    </label>

    <button class="boton" type="submit">Enviar Mensaje</button>

</form>

<?php
pie();
?>

//CLAVE SSH: xsmtpsib-7efd7ea5c2e73a4fdef7948fde94c09a67abeeed9c36a7253c189abf86da3a1b-m7AEcyBAcCWVinlT