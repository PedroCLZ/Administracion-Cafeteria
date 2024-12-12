<?php
include_once '../header1.php';
require_once '../../models/ProductoModel.php';



// Obtener productos desde el modelo
$productoModel = new ProductoModel();
$productos = $productoModel->obtenerProductos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>KOPPEE - Coffee Shop HTML Template</title>
    <!-- Tu contenido de cabecera va aquí -->
</head>
<body>

    
    <div class="container-fluid pt-5">
        <div class="container">

            
            <!-- Tabla de productos -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($productos)): ?>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td>
                                    <!-- Imagen de producto -->
                                    <img class="w-100 rounded-circle" src="/Administracion-Cafeteria/img/menu-1.jpg" alt="Producto" style="width: 100px; height: 100px;">
                                </td>
                                <td><?= htmlspecialchars($producto['NOMBRE_PRODUCTO'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($producto['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>₡<?= number_format($producto['PRECIO_UNITARIO'], 2) ?></td>
                                <td>
                                    <!-- Botones de acción -->
                                    <a href="actualizarProducto.php?id=<?= $producto['ID_PRODUCTO'] ?>" class="btn btn-warning btn-sm">Actualizar</a>
                                    <a href="eliminarProducto.php?id=<?= $producto['ID_PRODUCTO'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este producto?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No hay productos disponibles en este momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
