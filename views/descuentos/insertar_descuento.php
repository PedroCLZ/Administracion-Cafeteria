<?php
require_once '../../models/DescuentoModel.php';

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_descuento = $_POST['nombre_descuento'] ?? '';
    $descripcion_descuento = $_POST['descripcion'] ?? '';
    $monto_descuento = $_POST['monto_descuento'] ?? '';
    $id_estado = $_POST['id_estado'] ?? '';

    $descuentoModel = new DescuentoModel();
    $descuentoModel->insertarDescuento($nombre_descuento, $descripcion_descuento, 
    $monto_descuento, $id_estado);

    // Redirigir después de insertar
    header('Location: descuentosView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <title>Insertar Descuento</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<body>
     <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Administrador</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="/Administracion-Cafeteria/index.php">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Insertar un descuento</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
    <button type="button" class="btn btn-primary" onclick="window.history.back();">
    <i class="fas fa-arrow-left"></i> </button>
    
        <h2>Agregar Nuevo Descuento</h2>
        <form action="insertar_Descuento.php" method="POST">
            <div class="form-group">
                <label for="nombre_descuento">Nombre del Descuento:</label>
                <input type="text" class="form-control" id="nombre_descuento" name="nombre_descuento" required>
            </div>

            <div class="form-group">
                <label for="descripcion-desccuento">Descripción:</label>
                <textarea class="form-control" id="descripcion-desccuento" name="descripcion-desccuento" required></textarea>
            </div>

            <div class="form-group">
                <label for="monto_descuento">Monto del descuento:</label>
                <input type="number" class="form-control" id="monto_descuento" name="monto_descuento" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="text" class="form-control" id="id_estado" name="id_estado" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Descuento</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
