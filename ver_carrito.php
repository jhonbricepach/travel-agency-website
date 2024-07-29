<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <div id="cart-container">
        <?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])): ?>
            <ul>
                <?php foreach ($_SESSION['carrito'] as $index => $item): ?>
                    <li>
                        <?php echo htmlspecialchars($item['nombre']); ?> - $<?php echo number_format($item['precio'], 0, ',', '.'); ?> CLP
                        <form action="eliminar_paquete.php" method="post" style="display:inline;">
                            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
            <form action="vaciar_carrito.php" method="post">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <button type="submit">Vaciar Carrito</button>
            </form>
            <form action="procesar_pago.php" method="post">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <button type="submit">Realizar Pago</button>
            </form>
        <?php else: ?>
            <p>El carrito está vacío.</p>
        <?php endif; ?>
    </div>
    
    <a href="index.php">Volver a la tienda</a>
    <?php
    include 'notificaciones.php';
    mostrarNotificaciones();
    ?>
</body>
</html>
