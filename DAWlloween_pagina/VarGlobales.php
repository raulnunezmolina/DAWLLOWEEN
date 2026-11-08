<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('PREGUNTA_SEGURIDAD', '¿Cuál es tu palabra secreta para recuperar la contraseña?');

if (!isset($_SESSION['mimatriz'])) {
    $_SESSION['mimatriz'] = [
        [
            'Usuario' => 'admin',
            'Contraseña' => password_hash('1234', PASSWORD_DEFAULT),
            'Email' => 'admin@halloween.com',
            'Respuesta' => 'calabaza',
            'Perfil' => 'admin'
        ],
        [
            'Usuario' => 'usuario',
            'Contraseña' => password_hash('1234', PASSWORD_DEFAULT),
            'Email' => 'usuario@halloween.com',
            'Respuesta' => 'fantasma',
            'Perfil' => 'user'
        ]
    ];
}
function h($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}
function redirect($url) {
    header("Location: $url");
    exit;
}
function buscarUsuario($nombre) {
    foreach ($_SESSION['mimatriz'] as $i => $u) {
        if (strcasecmp($u['Usuario'], $nombre) === 0) {
            return $i;
        }
    }
    return -1;
}
function currentUser($posicion = null) {
    if ($posicion !== null) {
        $_SESSION['usuario_actual'] = $posicion;
    }
    return $_SESSION['usuario_actual'] ?? null;
}
function usuarioLogueado() {
    $idx = currentUser();
    if ($idx !== null && isset($_SESSION['mimatriz'][$idx])) {
        return $_SESSION['mimatriz'][$idx];
    }
    return null;
}
function exigirLogin() {
    if (usuarioLogueado() === null) {
        redirect('login.php');
    }
}
function AltaUsuario($usuario, $contrasena, $email, $respuesta) {
    $usuario = trim($usuario);
    $respuesta = strtolower(trim($respuesta));

    if (strlen($usuario) < 3 || strlen($usuario) > 20) {
        return 'El usuario debe tener entre 3 y 20 caracteres.';
    }
    if (strlen($contrasena) < 4) {
        return 'La contraseña debe tener al menos 4 caracteres.';
    }
    if ($respuesta === '') {
        return 'Escribe una palabra secreta para poder recuperar tu contraseña.';
    }
    if (buscarUsuario($usuario) !== -1) {
        return 'Ese usuario ya existe. Elige otro nombre.';
    }
    $_SESSION['mimatriz'][] = [
        'Usuario' => $usuario,
        'Contraseña' => password_hash($contrasena, PASSWORD_DEFAULT),
        'Email' => $email,
        'Respuesta' => $respuesta,
        'Perfil' => 'user'
    ];
    return '';
}
function cambioContraseña($usuario, $respuesta, $nueva) {
    $pos = buscarUsuario(trim($usuario));
    if ($pos === -1) {
        return 'El usuario no existe.';
    }
    $resGuardada = strtolower(trim($_SESSION['mimatriz'][$pos]['Respuesta']));
    if ($resGuardada !== strtolower(trim($respuesta))) {
        return 'La palabra secreta no coincide.';
    }
    if (strlen($nueva) < 4) {
        return 'La nueva contraseña debe tener al menos 4 caracteres.';
    }

    $_SESSION['mimatriz'][$pos]['Contraseña'] = password_hash($nueva, PASSWORD_DEFAULT);
    return '';
}
?>