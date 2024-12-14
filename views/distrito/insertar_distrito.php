<?php
include_once '../../views/header1.php';
require_once '../../models/DistritoModel.php';
require_once '../../models/CantonModel.php';

// Crear una instancia del modelo para obtener los cantones
$cantonModel = new CantonModel();
$cantones = $cantonModel->obtenerCantones(); // Método que retorna una lista de cantones

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreDistrito = $_POST['nombre_distrito'] ?? '';
    $idCanton = $_POST['id_canton'] ?? '';
    $estado = $_POST['estado'] ?? '';

    $distritoModel = new DistritoModel();
    $distritoModel->insertarDistrito($nombreDistrito, $idCanton, $estado);

    header('Location: distritosView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Insertar Distrito</title>
</head>

<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Agregar Nuevo Distrito</h2>
        <form action="insertar_distrito.php" method="POST">
            <div class="form-group">
                <label for="nombre_distrito">Nombre del Distrito:</label>
                <input type="text" class="form-control" id="nombre_distrito" name="nombre_distrito" required>
            </div>

            <div class="form-group">
                <label for="id_canton">Cantón:</label>
                <select class="form-control" id="id_canton" name="id_canton" required>
                    <option value="">Seleccione un cantón</option>
                    <?php foreach ($cantones as $canton): ?>
                        <option value="<?= htmlspecialchars($canton['ID_CANTON'], ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($canton['NOMBRE_CANTON'], ENT_QUOTES, 'UTF-8') ?>
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

            <button type="submit" class="btn btn-primary">Agregar Distrito</button>
        </form>
    </div>
</body>

</html>

<?php
include_once '../footer.php';
?>
