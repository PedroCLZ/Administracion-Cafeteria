<?php
include_once '../../views/header1.php';
require_once '../../models/DistritoModel.php';
require_once '../../models/CantonModel.php';

// Obtener el ID del distrito desde la URL
$id_distrito = $_GET['id'] ?? null;

// Crear instancias de los modelos
$distritoModel = new DistritoModel();
$cantonModel = new CantonModel();

// Obtener los datos del distrito
$distrito = $distritoModel->obtenerDistritoPorId($id_distrito);

// Si no existe el distrito, redirigir o mostrar error
if (!$distrito) {
    header('Location: distritosView.php');
    exit;
}

// Obtener la lista de cantones para el dropdown
$cantones = $cantonModel->obtenerCantones();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Actualizar Distrito</title>
</head>

<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Actualizar Distrito</h2>
        <form action="procesarActualizarDistrito.php" method="POST">
            <input type="hidden" name="id_distrito" value="<?= htmlspecialchars($distrito['ID_DISTRITO'], ENT_QUOTES, 'UTF-8') ?>">

            <div class="form-group">
                <label for="nombre_distrito">Nombre del Distrito:</label>
                <input type="text" class="form-control" id="nombre_distrito" name="nombre_distrito" value="<?= htmlspecialchars($distrito['NOMBRE_DISTRITO'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>

            <div class="form-group">
                <label for="id_canton">Cantón:</label>
                <select class="form-control" id="id_canton" name="id_canton" required>
                    <?php foreach ($cantones as $canton): ?>
                        <option value="<?= htmlspecialchars($canton['ID_CANTON'], ENT_QUOTES, 'UTF-8') ?>" <?= $canton['ID_CANTON'] == $distrito['ID_CANTON'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($canton['NOMBRE_CANTON'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1" <?= $distrito['ID_ESTADO'] == 1 ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= $distrito['ID_ESTADO'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Distrito</button>
        </form>
    </div>
</body>

</html>

<?php
include_once '../footer.php';
?>
