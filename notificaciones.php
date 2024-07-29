<?php
function mostrarNotificaciones() {
    // notificaciones de prueba
    $notificaciones = [
        "¡Oferta especial! Descuento del 20% en vuelos a París.",
        "¡Última oportunidad! Reserva tu viaje a Nueva York con un 15% de descuento.",
        "Nuevos paquetes disponibles para Tokio, ¡reserva ahora!"
    ];

    // Mostrar notificaciones
    foreach ($notificaciones as $notificacion) {
        echo "<script>showNotification('$notificacion');</script>";
    }
}
?>
