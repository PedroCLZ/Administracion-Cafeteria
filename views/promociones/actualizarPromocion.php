<?php 
include_once '../header1.php';
require_once '../../models/PromocionesModel.php'; 

// Obtener el ID de la promocion desde la URL
$id_promocion = $_GET['id']; 

// Obtener los datos de la promocion desde el modelo
$promocionModel = new PromocionModel();
$promocion = $promocionModel->obtenerPromocionesPorID($id_promocion);

// Si no existe el promocion, redirigir o mostrar error
if (!$promocion) {
    header('Location: promocionView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <title>Actualizar promocion</title>
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
                <p class="m-0 text-white">Actualizacion la promocion</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
    <button type="button" class="btn btn-primary" onclick="window.history.back();">
    <i class="fas fa-arrow-left"></i> </button>
    
        <h2>Actualizar promocion</h2>
        <form action="procesarActualizar.php" method="POST">
            <input type="hidden" name="id_promocion" value="<?= $promocion['ID_PROMOCION'] ?>">

            <div class="form-group">
                <label for="nombre_promocion">Nombre del la promocion:</label>
                <input type="text" class="form-control" id="nombre_promocion" name="nombre_promocion" value="<?= $promocion['NOMBRE_PROMOCION']  ?>" required>
            </div>
            
            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio de la promocion:</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?=$promocion['FECHA_INICIO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha limite de la promocion:</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?= $promocion['FECHA_FIN'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_producto">Producto:</label>
                <input type="text" class="form-control" id="id_producto" name="id_producto" value="<?= $promocion['ID_PRODUCTO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_descuento">Descuento:</label>
                <input type="text" class="form-control" id="id_descuento" name="id_descuento" value="<?= $promocion['ID_DESCUENTO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="number" class="form-control" id="id_estado" name="id_estado" value="<?= $promocion['ID_ESTADO'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar promocion</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
