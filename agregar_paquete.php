<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('Token CSRF inválido');
    }

    $nombre = htmlspecialchars($_POST['nombre']);
    $precio = floatval($_POST['precio']);

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $_SESSION['carrito'][] = ['nombre' => $nombre, 'precio' => $precio];

    $_SESSION['notificaciones'][] = "Paquete '$nombre' agregado al carrito.";
    header('Location: index.php');
    exit();
}
?>
