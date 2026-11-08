<?php
include 'VarGlobales.php';
unset($_SESSION['usuario_actual']);
redirect('login.php');
?>