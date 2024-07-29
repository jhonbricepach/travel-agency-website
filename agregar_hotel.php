<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $ubicacion = htmlspecialchars($_POST['ubicacion']);
    $habitaciones_disponibles = intval($_POST['habitaciones_disponibles']);
    $tarifa_noche = floatval($_POST['tarifa_noche']);

    $sql = "INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nombre, $ubicacion, $habitaciones_disponibles, $tarifa_noche);

    if ($stmt->execute()) {
        echo "Hotel agregado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
