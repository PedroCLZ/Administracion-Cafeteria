<?php
include_once '../../views/header1Developer.php'; // Ajusta la ruta si está en otro nivel de carpetas
require_once '../../models/PromocionesModel.php';

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_promocion = $_POST['nombre_promocion'] ?? '';
    $fecha_inicio = $_POST['fecha_inicio'] ?? '';
    $fecha_fin = $_POST['fecha_fin'] ?? '';
    $id_producto = $_POST['id_producto'] ?? '';
    $id_descuento = $_POST['id_descuento'] ?? '';
    $id_estado = $_POST['id_estado'] ?? '';

    $promocionModel = new PromocionModel();
    $promocionModel->insertarPromocion($nombre_promocion, $fecha_inicio, 
    $fecha_fin, $id_producto, $id_descuento, $id_estado);

    // Redirigir después de insertar
    header('Location: promocionView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insertar Promocion</title>
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
                <p class="m-0 text-white">Insertar una promocion </p>
            </div>
        </div>
    </div> 
    <!-- Page Header End -->

    <div class="container pt-5">
    <button type="button" class="btn btn-primary" onclick="window.history.back();">
    <i class="fas fa-arrow-left"></i> </button>
    
        <h2>Agregar nueva promocion</h2>
        <form action="insertar_Promocion.php" method="POST">
            <div class="form-group">
                <label for="nombre_promocion">Nombre de la promocion:</label>
                <input type="text" class="form-control" id="nombre_promocion" name="nombre_promocion" required>
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de incio de la promocion:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required></textarea>
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha limite de la promocion:</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
            </div>

            <div class="form-group">
                <label for="id_producto">ID del producto:</label>
                <input type="text" class="form-control" id="id_producto" name="id_producto" required>
            </div>

            <div class="form-group">
                <label for="id_descuento">ID del descuento:</label>
                <input type="text" class="form-control" id="id_descuento" name="id_descuento" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="text" class="form-control" id="id_estado" name="id_estado" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar la promocion</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
