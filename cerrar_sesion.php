<?php
session_start(); // Iniciar la sesión si aún no está iniciada

// Eliminar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión u otra página deseada
header('Location: Location: index.php');
exit();
?>
