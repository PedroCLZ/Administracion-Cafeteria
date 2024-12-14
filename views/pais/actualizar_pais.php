<?php
include_once '../header1.php';
require_once '../../models/PaisModel.php';

// Obtener el ID del país desde la URL
$id_pais = $_GET['id'];

// Obtener los datos del país desde el modelo
$paisModel = new PaisModel();
$pais = $paisModel->obtenerPaisPorId($id_pais);

// Si no existe el país, redirigir o mostrar error
if (!$pais) {
    header('Location: paisesView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Actualizar País</title>
</head>
<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Actualizar País</h2>
        <form action="procesarActualizar.php" method="POST">
            <input type="hidden" name="id_pais" value="<?= $pais['ID_PAIS'] ?>">

            <div class="form-group">
                <label for="nombre">Nombre del País:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($pais['NOMBRE_PAIS'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="text" class="form-control" id="id_estado" name="id_estado" value="<?= $pais['ID_ESTADO'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar País</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
