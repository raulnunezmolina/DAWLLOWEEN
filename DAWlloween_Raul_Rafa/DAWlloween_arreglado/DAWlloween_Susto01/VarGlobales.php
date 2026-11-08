<?php
// Fichero con lo común a toda la web: la matriz de usuarios y las funciones
// que usan el resto de páginas (login, registro, cambio de contraseña...).
// Todo se guarda en $_SESSION para poder usarlo en cualquier fichero que lo incluya.

// Arranco la sesión solo si no estaba ya arrancada, así no da error al incluirlo varias veces.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// La pregunta de seguridad es la misma para todos los usuarios, pero cada uno la lleva en su campo 'Pregunta'.
define('PREGUNTA_SEGURIDAD', '¿Cuál es tu palabra secreta para recuperar la contraseña?');

// Si la matriz aún no existe en la sesión, la creo con dos usuarios de prueba (admin y usuario).
// Las contraseñas las guardo con password_hash, no en texto normal.
// 'UsuarioActual' empieza en false porque al principio no hay nadie logueado.
if (!isset($_SESSION['mimatriz'])) {
    $_SESSION['mimatriz'] = [
        [
            'Usuario' => 'admin',
            'Contraseña' => password_hash('123456', PASSWORD_DEFAULT),
            'Email' => 'admin@halloween.com',
            'Respuesta' => 'calabaza',
            'Pregunta' => PREGUNTA_SEGURIDAD,
            'UsuarioActual' => false,
            'Perfil' => 'admin',
        ],
        [
            'Usuario' => 'usuario',
            'Contraseña' => password_hash('123456', PASSWORD_DEFAULT),
            'Email' => 'usuario@halloween.com',
            'Respuesta' => 'fantasma',
            'Pregunta' => PREGUNTA_SEGURIDAD,
            'UsuarioActual' => false,
            'Perfil' => 'user',
        ]
    ];
}
// Limpia un texto antes de ponerlo en el HTML para que no se pueda colar código.
function h($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
// Lleva al usuario a otra página y corta el script.
function redirect($url) {
    header("Location: $url");
    exit;
}
// Busca un usuario en la matriz sin fijarse en mayúsculas.
// Devuelve su posición o -1 si no lo encuentra.
function buscarUsuario($nombre) {
    foreach ($_SESSION['mimatriz'] as $i => $u) {
        if (strcasecmp($u['Usuario'], $nombre) === 0) {
            return $i;
        }
    }
    return -1;
}
// Si le paso una posición, guarda ese usuario como el que está logueado
// y lo marca con 'UsuarioActual' = true en la matriz (los demás quedan en false).
// Si no le paso nada, solo devuelve la posición del usuario actual.
function currentUser($posicion = null) {
    if ($posicion !== null) {
        $_SESSION['usuario_actual'] = $posicion;

        // Primero pongo a todos como no logueados
        foreach ($_SESSION['mimatriz'] as $i => $u) {
            $_SESSION['mimatriz'][$i]['UsuarioActual'] = false;
        }
        // Y marco solo al que acaba de entrar
        $_SESSION['mimatriz'][$posicion]['UsuarioActual'] = true;
    }
    return $_SESSION['usuario_actual'] ?? null;
}
// Devuelve los datos del usuario logueado (su fila de la matriz) o null si no ha entrado nadie.
function usuarioLogueado() {
    $idx = currentUser();
    if ($idx !== null && isset($_SESSION['mimatriz'][$idx])) {
        return $_SESSION['mimatriz'][$idx];
    }
    return null;
}
// Se pone al principio de las páginas privadas: si no hay nadie logueado, manda al login.
function exigirLogin() {
    if (usuarioLogueado() === null) {
        redirect('login.php');
    }
}
// Añade un usuario nuevo al final de la matriz.
// Devuelve el texto del error si algo falla, o '' si todo ha ido bien.
// El perfil siempre se guarda como 'user' y 'UsuarioActual' empieza en false.
function AltaUsuario($usuario, $contrasena, $email, $respuesta) {
    $usuario = trim($usuario);
    $email = trim($email);
    $respuesta = strtolower(trim($respuesta));

    // Compruebo los datos antes de guardar nada.
    if (strlen($usuario) < 3 || strlen($usuario) > 20) {
        return 'El usuario debe tener entre 3 y 20 caracteres.';
    }
    if (strlen($contrasena) < 6) {
        return 'La contraseña debe tener al menos 6 caracteres.';
    }
    // Compruebo el email también aquí, porque el type="email" del formulario se puede saltar.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Escribe un correo electrónico válido.';
    }
    if ($respuesta === '') {
        return 'Escribe una palabra secreta para poder recuperar tu contraseña.';
    }
    if (buscarUsuario($usuario) !== -1) {
        return 'Ese usuario ya existe. Elige otro nombre.';
    }
    // Todo correcto: lo añado a la matriz.
    $_SESSION['mimatriz'][] = [
        'Usuario' => $usuario,
        'Contraseña' => password_hash($contrasena, PASSWORD_DEFAULT),
        'Email' => $email,
        'Respuesta' => $respuesta,
        'Pregunta' => PREGUNTA_SEGURIDAD,
        'UsuarioActual' => false,
        'Perfil' => 'user',
    ];
    return '';
}
// Cambia la contraseña de un usuario si ha acertado la palabra secreta.
// Igual que la de arriba: devuelve el error o '' si ha ido bien.
function cambioContraseña($usuario, $respuesta, $nueva) {
    $pos = buscarUsuario(trim($usuario));
    if ($pos === -1) {
        return 'El usuario no existe.';
    }
    // Comparo la palabra secreta sin fijarme en mayúsculas ni en espacios.
    $resGuardada = strtolower(trim($_SESSION['mimatriz'][$pos]['Respuesta']));
    if ($resGuardada !== strtolower(trim($respuesta))) {
        return 'La palabra secreta no coincide.';
    }
    if (strlen($nueva) < 6) {
        return 'La nueva contraseña debe tener al menos 6 caracteres.';
    }

    // Guardo la contraseña nueva también con password_hash.
    $_SESSION['mimatriz'][$pos]['Contraseña'] = password_hash($nueva, PASSWORD_DEFAULT);
    return '';
}
?>
