<!DOCTYPE html>
<html>
<head>
    <title>Consulta Avanzada de Reservas por Hotel</title>
</head>
<body>
    <h2>Hoteles con Más de Dos Reservas</h2>
    <?php
    include 'conexion.php';

    $sql = "
    SELECT H.nombre, H.ubicacion, COUNT(R.id_reserva) AS num_reservas
    FROM HOTEL H
    JOIN RESERVA R ON H.id_hotel = R.id_hotel
    GROUP BY H.id_hotel, H.nombre, H.ubicacion
    HAVING COUNT(R.id_reserva) > 2";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Nombre Hotel</th><th>Ubicación</th><th>Número de Reservas</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["ubicacion"] . "</td>";
            echo "<td>" . $row["num_reservas"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay hoteles con más de dos reservas.";
    }

    $conn->close();
    ?>
</body>
</html>