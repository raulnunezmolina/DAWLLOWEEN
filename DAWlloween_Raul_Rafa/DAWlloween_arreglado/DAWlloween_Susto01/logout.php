<?php
include 'VarGlobales.php';
// Si hay alguien logueado, lo marco como no logueado en la matriz
if (currentUser() !== null) {
    $_SESSION['mimatriz'][currentUser()]['UsuarioActual'] = false;
}
// Quito solo el usuario actual de la sesión (la matriz se queda como está) y vuelvo al login.
unset($_SESSION['usuario_actual']);
redirect('login.php');
?>
