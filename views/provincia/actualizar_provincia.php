<?php
include_once '../header1.php';
require_once '../../models/ProvinciaModel.php';
require_once '../../models/PaisModel.php';

// Obtener el ID de la provincia desde la URL
$id_provincia = $_GET['id'];

// Crear instancias de los modelos
$provinciaModel = new ProvinciaModel();
$paisModel = new PaisModel();

// Obtener los datos de la provincia
$provincia = $provinciaModel->obtenerProvinciaPorId($id_provincia);

// Si no existe la provincia, redirigir o mostrar error
if (!$provincia) {
    header('Location: provinciasView.php');
    exit;
}

// Obtener la lista de países para el dropdown
$paises = $paisModel->obtenerPaises();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Actualizar Provincia</title>
</head>
<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Actualizar Provincia</h2>
        <form action="procesarActualizar.php" method="POST">
            <input type="hidden" name="id_provincia" value="<?= $provincia['ID_PROVINCIA'] ?>">

            <div class="form-group">
                <label for="nombre">Nombre de la Provincia:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($provincia['NOMBRE_PROVINCIA'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="id_pais">País:</label>
                <select class="form-control" id="id_pais" name="id_pais" required>
                    <?php foreach ($paises as $pais): ?>
                        <option value="<?= $pais['ID_PAIS'] ?>" <?= $pais['ID_PAIS'] == $provincia['ID_PAIS'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($pais['NOMBRE_PAIS'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1" <?= $provincia['ID_ESTADO'] == 1 ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= $provincia['ID_ESTADO'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Provincia</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
