<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('Token CSRF inválido');
    }

    // Procesar el pago aquí (simulación)
    if (!empty($_SESSION['carrito'])) {
        // Guardar los detalles de la compra en la sesión
        $_SESSION['compra_realizada'] = $_SESSION['carrito'];
        
        // Vaciar el carrito
        unset($_SESSION['carrito']);
        
        header('Location: confirmacion_compra.php');
        exit();
    } else {
        $_SESSION['notificaciones'][] = "El carrito está vacío. No hay nada que pagar.";
        header('Location: index.php');
        exit();
    }
}
?>
