<?php
include_once '../../views/header1.php';
require_once '../../models/ProvinciaModel.php';
require_once '../../models/PaisModel.php';

// Crear una instancia del modelo para obtener los países
$paisModel = new PaisModel();
$paises = $paisModel->obtenerPaises(); // Método que retorna una lista de países

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreProvincia = $_POST['nombre_provincia'] ?? '';
    $idPais = $_POST['id_pais'] ?? '';
    $estado = $_POST['estado'] ?? '';

    $provinciaModel = new ProvinciaModel();
    $provinciaModel->insertarProvincia($nombreProvincia, $idPais, $estado);

    header('Location: provinciasView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Insertar Provincia</title>
</head>

<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Agregar Nueva Provincia</h2>
        <form action="insertar_provincia.php" method="POST">
            <div class="form-group">
                <label for="nombre_provincia">Nombre de la Provincia:</label>
                <input type="text" class="form-control" id="nombre_provincia" name="nombre_provincia" required>
            </div>

            <div class="form-group">
                <label for="id_pais">País:</label>
                <select class="form-control" id="id_pais" name="id_pais" required>
                    <option value="">Seleccione un país</option>
                    <?php foreach ($paises as $pais): ?>
                        <option value="<?= htmlspecialchars($pais['ID_PAIS'], ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($pais['NOMBRE_PAIS'], ENT_QUOTES, 'UTF-8') ?>
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

            <button type="submit" class="btn btn-primary">Agregar Provincia</button>
        </form>
    </div>
</body>

</html>

<?php
include_once '../footer.php';
?>