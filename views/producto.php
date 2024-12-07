<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Menú de Productos</h1>
    <div class="menu-container">
        <?php if (!empty($productos)): ?>
            <ul class="product-list">
                <?php foreach ($productos as $producto): ?>
                    <li class="product-item">
                    <h2><?= htmlspecialchars($producto['NOMBRE_PRODUCTO']) ?></h2>
                    <p><?= htmlspecialchars($producto['DESCRIPCION']) ?></p>
                        <p><strong>Precio:</strong> $<?= number_format($producto['PRECIO_UNITARIO'], 2) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No hay productos disponibles en este momento.</p>
        <?php endif; ?>
    </div>
</body>
</html>

