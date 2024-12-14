<?php
include_once '../../views/header1.php';
require_once '../../models/CantonModel.php';
require_once '../../models/ProvinciaModel.php';

// Crear una instancia del modelo para obtener las provincias
$provinciaModel = new ProvinciaModel();
$provincias = $provinciaModel->obtenerProvincias(); // Método que retorna una lista de provincias

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreCanton = $_POST['nombre_canton'] ?? '';
    $idProvincia = $_POST['id_provincia'] ?? '';
    $estado = $_POST['estado'] ?? '';

    $cantonModel = new CantonModel();
    $cantonModel->insertarCanton($nombreCanton, $idProvincia, $estado);

    header('Location: cantonesView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Insertar Canton</title>
</head>

<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Agregar Nuevo Cantón</h2>
        <form action="insertar_canton.php" method="POST">
            <div class="form-group">
                <label for="nombre_canton">Nombre del Cantón:</label>
                <input type="text" class="form-control" id="nombre_canton" name="nombre_canton" required>
            </div>

            <div class="form-group">
                <label for="id_provincia">Provincia:</label>
                <select class="form-control" id="id_provincia" name="id_provincia" required>
                    <option value="">Seleccione una provincia</option>
                    <?php foreach ($provincias as $provincia): ?>
                        <option value="<?= htmlspecialchars($provincia['ID_PROVINCIA'], ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($provincia['NOMBRE_PROVINCIA'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Cantón</button>
        </form>
    </div>
</body>

</html>

<?php
include_once '../footer.php';
?>
