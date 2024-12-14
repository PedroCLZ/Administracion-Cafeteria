<?php
include_once '../../views/header1Developer.php'; // Ajusta la ruta si está en otro nivel de carpetas
require_once '../../models/ProductoModel.php';

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $id_categoria = $_POST['id_categoria'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $id_proveedor = $_POST['id_proveedor'] ?? '';
    $id_estado = $_POST['id_estado'] ?? '';

    $productoModel = new ProductoModel();
    $productoModel->insertarProducto($nombre, $descripcion, 
    $id_categoria, $precio, $id_proveedor, $id_estado);

    // Redirigir después de insertar
    header('Location: productosView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insertar Producto</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
</head>
<body>
     <!-- Page Header Start -->
     <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px"> 
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
    <button type="button" class="btn btn-primary" onclick="window.history.back();">
    <i class="fas fa-arrow-left"></i> </button>
    
        <h2>Agregar Nuevo Producto</h2>
        <form action="insertar_Producto.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="id_categoria">Categoría:</label>
                <input type="text" class="form-control" id="id_categoria" name="id_categoria" required>
            </div>

            <div class="form-group">
                <label for="id_proveedor">Proveedor:</label>
                <input type="text" class="form-control" id="id_proveedor" name="id_proveedor" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="text" class="form-control" id="id_estado" name="id_estado" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
