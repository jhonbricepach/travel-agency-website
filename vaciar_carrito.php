<?php
session_start();

// Validar token CSRF
if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    die('Token CSRF inválido');
}

// Vaciar el carrito de compras
unset($_SESSION['carrito']);

// Redireccionar de vuelta a ver_carrito.php
header('Location: ver_carrito.php');
exit();
?>