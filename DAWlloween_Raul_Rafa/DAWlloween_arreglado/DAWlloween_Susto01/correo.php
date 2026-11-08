<?php
// Formulario para escribir a Jack. Solo se puede usar si has iniciado sesión.
// El correo se envía con PHPMailer.

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'VarGlobales.php';
// Si no hay nadie logueado, lo mando al login.
exigirLogin();
include 'plantilla.php';

// Cargo los ficheros de PHPMailer.
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

// Aquí guardo el texto que se enseña después de enviar y si es un aviso bueno ('ok') o un error.
$mensajeEnviado = '';
$tipoMensaje = 'ok';

// Obtenemos los datos del usuario conectado
$usuarioLogueado = usuarioLogueado();

// Esto solo se hace cuando se ha enviado el formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : '';
    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

    // Datos del usuario que ha iniciado sesión
    $nombre = $usuarioLogueado['Usuario'];
    $correoUsuario = $usuarioLogueado['Email'];

    // Solo envío si hay asunto, mensaje y el usuario tiene un correo válido.
    if ($asunto !== '' && $mensaje !== '' && filter_var($correoUsuario, FILTER_VALIDATE_EMAIL)) {

        // Con true, PHPMailer lanza una excepción si algo falla y la recojo en el catch.
        $correo = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP (Brevo).
            $correo->isSMTP();
            $correo->SMTPDebug = 0;
            $correo->Host = 'smtp-relay.brevo.com';
            $correo->SMTPAuth = true;

            // Datos de la cuenta de Brevo. Aquí hay que poner la clave real (solo en local, no se sube).
            $correo->Username = 'c17dcf001@smtp-brevo.com';
            $correo->Password = 'CLAVE SSH';

            $correo->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $correo->Port = 587;
            $correo->Timeout = 20;

            $correo->CharSet = 'UTF-8';

            // Remitente verificado de Brevo
            $correo->setFrom('raulnm242@gmail.com', 'DAWlloween');

            // Correo del usuario conectado: así Jack puede responderle a él.
            $correo->addReplyTo($correoUsuario, $nombre);

            // A quién le llega el correo.
            $correo->addAddress('skeletonjack@tempr.email');

            // El asunto es el que ha escrito el usuario en el formulario.
            $correo->Subject = $asunto;

            // Texto del correo: quién lo manda, su email y el mensaje.
            $correo->Body =
                "Usuario: " . $nombre . "\n" .
                "Correo del usuario: " . $correoUsuario . "\n\n" .
                "Mensaje:\n" . $mensaje;

            $correo->send();

            $mensajeEnviado = "Gracias, $nombre. Tu mensaje ha sido registrado en el expediente.";

        } catch (Throwable $e) {

            // Si falla el envío, aviso al usuario (en rojo) sin enseñarle el error técnico.
            $mensajeEnviado = 'No se ha podido enviar el mensaje. Inténtalo de nuevo.';
            $tipoMensaje = 'error';

        }

    } else {

        // Falta el asunto, el mensaje o el correo del usuario no es válido.
        $mensajeEnviado = 'Debes escribir un asunto y un mensaje, y tener un correo válido en tu cuenta.';
        $tipoMensaje = 'error';

    }
}

// Pinto la página con el formulario.
cabecera(
    'Contacto',
    'SECCIÓN 6 · CORREO',
    'Escribir a Jack',
    'Envía tu mensaje o sugerencia al expediente de pesadilla.',
    'login'
);

mensaje($tipoMensaje, $mensajeEnviado);
?>

<form class="formulario" method="post" action="correo.php">

    <label>Asunto
        <input type="text" name="asunto" required maxlength="100" placeholder="De qué trata tu pesadilla"
               value="<?php echo isset($_POST['asunto']) ? h($_POST['asunto']) : ''; ?>">
    </label>

    <label>Tu Mensaje
        <textarea name="mensaje" required placeholder="Escribe aquí tu mensaje o pesadilla..."></textarea>
    </label>

    <button class="boton" type="submit">Enviar Mensaje</button>

</form>

<?php
pie();
?>
