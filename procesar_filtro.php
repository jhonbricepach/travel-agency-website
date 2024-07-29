<?php
include 'filtro_destino.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar token CSRF
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('Token CSRF inválido');
    }

    $nombreHotel = htmlspecialchars($_POST['nombreHotel']);
    $ciudad = htmlspecialchars($_POST['ciudad']);
    $pais = htmlspecialchars($_POST['pais']);
    $fechaViaje = htmlspecialchars($_POST['fechaViaje']);
    $duracionViaje = htmlspecialchars($_POST['duracionViaje']);

    $filtro = new FiltroDestino($nombreHotel, $ciudad, $pais, $fechaViaje, $duracionViaje);
    $resultado = $filtro->buscarPaquetes();

    echo "<h2>Resultado de la búsqueda:</h2>";
    echo "<p>$resultado</p>";
}
?>
