<?php
session_start();

// Regenerar el ID de la sesión para prevenir fijación de sesión
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}

// Generar token CSRF
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Validar token CSRF para formularios
if ($_SERVER['REQUEST_METHOD'] == 'POST' && (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token'])) {
    die('Token CSRF inválido');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Agencia de Viajes</title>
</head>
<body>
    <h1>Agencia de Viajes</h1>
    <div class="search-container">
        <input type="text" id="destination" placeholder="Destino">
        <input type="date" id="travel-date">
        <button onclick="search()">Buscar</button>
    </div>
    <div id="results-container"></div>
    <div id="notifications"></div>

    <h1>Búsqueda de Viajes</h1>
    <form action="procesar_filtro.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <label for="nombreHotel">Nombre del Hotel:</label>
        <input type="text" id="nombreHotel" name="nombreHotel" required>
        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required>
        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" required>
        <label for="fechaViaje">Fecha de Viaje:</label>
        <input type="date" id="fechaViaje" name="fechaViaje" required>
        <label for="duracionViaje">Duración del Viaje (días):</label>
        <input type="number" id="duracionViaje" name="duracionViaje" required>
        <button type="submit">Buscar</button>
    </form>

    <h2>Agregar Paquete al Carrito</h2>
    <form action="agregar_paquete.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <label for="nombre">Nombre del Paquete:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" required>
        <button type="submit">Agregar al Carrito</button>
    </form>

    <a href="ver_carrito.php">Ver Carrito de Compras</a>
    <a href="cerrar_sesion.php">Cerrar sesión</a>


    <h2>Agregar Vuelo</h2>
    <form name="vueloForm" action="agregar_vuelo.php" onsubmit="return validateForm()" method="post">
        Origen: <input type="text" name="origen" required><br>
        Destino: <input type="text" name="destino" required><br>
        Fecha: <input type="date" name="fecha" required><br>
        Plazas Disponibles: <input type="number" name="plazas_disponibles" required><br>
        Precio: <input type="number" step="0.01" name="precio" required><br>
        <input type="submit" value="Agregar Vuelo">
    </form>

    <h2>Agregar Hotel</h2>
    <form name="hotelForm" action="agregar_hotel.php" onsubmit="return validateForm()" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Ubicación: <input type="text" name="ubicacion" required><br>
        Habitaciones Disponibles: <input type="number" name="habitaciones_disponibles" required><br>
        Tarifa por Noche: <input type="number" step="0.01" name="tarifa_noche" required><br>
        <input type="submit" value="Agregar Hotel">
    </form>
    <!-- botón para ir a la página de consulta avanzada -->
    <button onclick="location.href='consulta_avanzada.php'">Consulta Avanzada de Reservas por Hotel</button>

    <script src="script.js"></script>
 
    <?php
    include 'notificaciones.php';
    mostrarNotificaciones();
    ?>
</body>
</html>
