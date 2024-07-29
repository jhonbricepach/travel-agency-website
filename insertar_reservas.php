
<?php
include 'conexion.php';

// Obtén los ids existentes de vuelos y hoteles
$vuelo_ids = [];
$hotel_ids = [];

$vuelo_result = $conn->query("SELECT id_vuelo FROM vuelo");
while ($row = $vuelo_result->fetch_assoc()) {
    $vuelo_ids[] = $row['id_vuelo'];
}

$hotel_result = $conn->query("SELECT id_hotel FROM hotel");
while ($row = $hotel_result->fetch_assoc()) {
    $hotel_ids[] = $row['id_hotel'];
}

for ($i = 1; $i <= 10; $i++) {
    $id_cliente = $i;
    $fecha_reserva = date("Y-m-d", strtotime("+$i days"));
    $id_vuelo = $vuelo_ids[array_rand($vuelo_ids)];
    $id_hotel = $hotel_ids[array_rand($hotel_ids)];

    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isii", $id_cliente, $fecha_reserva, $id_vuelo, $id_hotel);

    if ($stmt->execute()) {
        echo "Reserva $i agregada exitosamente.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error . "<br>";
    }
    $stmt->close();
}

$conn->close();
?>
