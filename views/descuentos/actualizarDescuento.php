<?php
require_once '../../models/DescuentoModel.php';
  
// Obtener el ID del descuento desde la URL
$id_descuento = $_GET['id'];

// Obtener los datos del descuento desde el modelo
$descuentoModel = new DescuentoModel();
$descuento = $descuentoModel->obtenerDescuentoPorID($id_descuento);

// Si no existe el descuento, redirigir o mostrar error
if (!$descuento) {
    header('Location: descuentosView.php');
    exit;
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Actualizar Descuento</title>
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
                <p class="m-0 text-white">Actualizacion del descuento</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    
    <div class="container pt-5">
    <button type="button" class="btn btn-primary" onclick="window.history.back();">
    <i class="fas fa-arrow-left"></i> </button>
    
        <h2>Actualizar Descuento</h2>
        <form action="procesarActualizar.php" method="POST">
            <input type="hidden" name="id_descuento" value="<?= $descuento['ID_DESCUENTO'] ?>">

            <div class="form-group">
                <label for="nombre_descuento">Nombre del descuento:</label>
                <input type="text" class="form-control" id="nombre_descuento" name="nombre_descuento" value="<?= htmlspecialchars($descuento['NOMBRE'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?= htmlspecialchars($descuento['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <div class="form-group">
                <label for="monto_descuento">Monto del descuento:</label>
                <input type="number" class="form-control" id="monto_descuento" name="monto_descuento" value="<?= $descuento['MONTO_DESCUENTO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="text" class="form-control" id="id_estado" name="id_estado" value="<?= $descuento['ID_ESTADO'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Descuento</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
