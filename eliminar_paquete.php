<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('Token CSRF inválido');
    }

    $index = intval($_POST['index']);
    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar el array
        $_SESSION['notificaciones'][] = "Paquete eliminado del carrito.";
    } else {
        $_SESSION['notificaciones'][] = "No se pudo eliminar el paquete.";
    }

    header('Location: ver_carrito.php');
    exit();
}
?>
