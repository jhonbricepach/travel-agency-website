<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = htmlspecialchars($_POST['origen']);
    $destino = htmlspecialchars($_POST['destino']);
    $fecha = $_POST['fecha'];
    $plazas_disponibles = intval($_POST['plazas_disponibles']);
    $precio = floatval($_POST['precio']);

    $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $origen, $destino, $fecha, $plazas_disponibles, $precio);

    if ($stmt->execute()) {
        echo "Vuelo agregado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
