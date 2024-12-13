<?php
include_once '../header1.php';
require_once '../../models/ProductoModel.php';
 
// Obtener el ID del producto desde la URL
$id_producto = $_GET['id'];

// Obtener los datos del producto desde el modelo
$productoModel = new ProductoModel();
$producto = $productoModel->obtenerProductoPorId($id_producto);

// Si no existe el producto, redirigir o mostrar error
if (!$producto) {
    header('Location: productosView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Actualizar Producto</title>
</head>
<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px"> 
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Actualizar Producto</h2>
        <form action="procesarActualizar.php" method="POST">
            <input type="hidden" name="id_producto" value="<?= $producto['ID_PRODUCTO'] ?>">

            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['NOMBRE_PRODUCTO'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?= htmlspecialchars($producto['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?= $producto['PRECIO_UNITARIO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_categoria">Categoría:</label>
                <input type="text" class="form-control" id="id_categoria" name="id_categoria" value="<?= $producto['ID_CATEGORIA'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_proveedor">Proveedor:</label>
                <input type="text" class="form-control" id="id_proveedor" name="id_proveedor" value="<?= $producto['ID_PROVEEDOR'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="text" class="form-control" id="id_estado" name="id_estado" value="<?= $producto['ID_ESTADO'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
