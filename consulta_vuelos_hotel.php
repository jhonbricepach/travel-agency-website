<?php
include 'conexion.php';

// Mostrar contenido de la tabla VUELO
$sql_vuelo = "SELECT origen, destino, fecha, plazas_disponibles, precio FROM VUELO";
$result_vuelo = $conn->query($sql_vuelo);

if ($result_vuelo->num_rows > 0) {
    echo "<h2>Contenido de la tabla VUELO</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Origen</th><th>Destino</th><th>Fecha</th><th>Plazas Disponibles</th><th>Precio</th></tr>";
    while($row = $result_vuelo->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["origen"] . "</td>";
        echo "<td>" . $row["destino"] . "</td>";
        echo "<td>" . date("d-m-Y", strtotime($row["fecha"])) . "</td>";
        echo "<td>" . $row["plazas_disponibles"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros en la tabla VUELO.";
}

// Mostrar contenido de la tabla HOTEL
$sql_hotel = "SELECT id_hotel, nombre, ubicacion, habitaciones_disponibles, tarifa_noche FROM HOTEL";
$result_hotel = $conn->query($sql_hotel);

if ($result_hotel->num_rows > 0) {
    echo "<h2>Contenido de la tabla HOTEL</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID Hotel</th><th>Nombre</th><th>Ubicación</th><th>Habitaciones Disponibles</th><th>Tarifa por Noche</th></tr>";
    while($row = $result_hotel->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_hotel"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["ubicacion"] . "</td>";
        echo "<td>" . $row["habitaciones_disponibles"] . "</td>";
        echo "<td>" . $row["tarifa_noche"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros en la tabla HOTEL.";
}

$conn->close();
?>
