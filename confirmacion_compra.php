<?php
session_start();

if (!isset($_SESSION['compra_realizada'])) {
    header('Location: index.php');
    exit();
}

$paquetes_comprados = $_SESSION['compra_realizada'];
unset($_SESSION['compra_realizada']); // Limpiar la información de la compra después de mostrarla
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirmación de Compra</title>
</head>
<body>
    <h1>¡Compra Exitosa!</h1>
    <p>Gracias por su compra. A continuación, se muestran los detalles de su compra:</p>
    <div id="cart-container">
        <ul>
            <?php foreach ($paquetes_comprados as $item): ?>
                <li>
                    <?php echo htmlspecialchars($item['nombre']); ?> - $<?php echo number_format($item['precio'], 0, ',', '.'); ?> CLP
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a href="index.php">Volver a la tienda</a>
</body>
</html>
