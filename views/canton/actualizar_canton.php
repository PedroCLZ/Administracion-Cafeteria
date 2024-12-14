<?php
include_once '../header1.php';
require_once '../../models/CantonModel.php';
require_once '../../models/ProvinciaModel.php';

// Obtener el ID del cantón desde la URL
$id_canton = $_GET['id'];

// Crear instancias de los modelos
$cantonModel = new CantonModel();
$provinciaModel = new ProvinciaModel();

// Obtener los datos del cantón
$canton = $cantonModel->obtenerCantonPorId($id_canton);

// Si no existe el cantón, redirigir o mostrar error
if (!$canton) {
    header('Location: cantonesView.php');
    exit;
}

// Obtener la lista de provincias para el dropdown
$provincias = $provinciaModel->obtenerProvincias();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Actualizar Cantón</title>
</head>
<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Actualizar Cantón</h2>
        <form action="procesarActualizar.php" method="POST">
            <input type="hidden" name="id_canton" value="<?= $canton['ID_CANTON'] ?>">

            <div class="form-group">
                <label for="nombre">Nombre del Cantón:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($canton['NOMBRE_CANTON'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="id_provincia">Provincia:</label>
                <select class="form-control" id="id_provincia" name="id_provincia" required>
                    <?php foreach ($provincias as $provincia): ?>
                        <option value="<?= $provincia['ID_PROVINCIA'] ?>" <?= $provincia['ID_PROVINCIA'] == $canton['ID_PROVINCIA'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($provincia['NOMBRE_PROVINCIA'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1" <?= $canton['ID_ESTADO'] == 1 ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= $canton['ID_ESTADO'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Cantón</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
