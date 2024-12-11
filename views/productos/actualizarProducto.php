<?php
include_once '../header1.php';
require_once '../../models/ProductoModel.php';

// Obtener el ID del producto desde la URL
$id_producto = $_GET['id_producto'] ?? null;

if ($id_producto) {
    $productoModel = new ProductoModel();
    $producto = $productoModel->obtenerProductoPorId($id_producto);
} else {
    echo "Producto no encontrado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
</head>
<body>
    <h1>Actualizar Producto</h1>
    <form action="procesarActualizar.php" method="POST">
        <input type="hidden" name="id_producto" value="<?= $id_producto ?>">

        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['NOMBRE_PRODUCTO'], ENT_QUOTES, 'UTF-8') ?>" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required><?= htmlspecialchars($producto['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></textarea><br>

        <label for="precio">Precio Unitario:</label>
        <input type="number" id="precio" name="precio" value="<?= $producto['PRECIO_UNITARIO'] ?>" required><br>

        <label for="id_categoria">Categoría:</label>
        <input type="number" id="id_categoria" name="id_categoria" value="<?= $producto['ID_CATEGORIA'] ?>" required><br>

        <label for="id_proveedor">Proveedor:</label>
        <input type="number" id="id_proveedor" name="id_proveedor" value="<?= $producto['ID_PROVEEDOR'] ?>" required><br>

        <label for="id_estado">Estado:</label>
        <input type="number" id="id_estado" name="id_estado" value="<?= $producto['ID_ESTADO'] ?>" required><br>

        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
