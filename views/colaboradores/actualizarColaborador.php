<?php 
include_once '../header1.php';
require_once '../../models/ColaboradoresModel.php'; 

// Obtener el ID del colaborador desde la URL
$id_colaborador = $_GET['id']; 

// Obtener los datos del colaborador desde el modelo
$colaboradorModel = new ColaboradoresModel();
$colaborador = $colaboradorModel->obtenerColaboradoresPorId($id_colaborador);

// Si no existe el colaborador, redirigir o mostrar error
if (!$colaborador) {
    header('Location: colaboradorView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Actualizar colaborador</title>
</head>
<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px"> 
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Actualizar colaborador</h2>
        <form action="procesarActualizar.php" method="POST">
            <input type="hidden" name="id_colaborador" value="<?= $colaborador['ID_COLABORADOR'] ?>">

            <div class="form-group">
                <label for="nombre_colaborador">Nombre del colaborador:</label>
                <input type="text" class="form-control" id="nombre_colaborador" name="nombre_colaborador" value="<?= htmlspecialchars($colaborador['NOMBRE_COLABORADOR'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="apellido_colaborador">Apellido colaborador:</label>
                <input type="text" class="form-control" id="apellido_colaborador" name="apellido_colaborador" required><?= htmlspecialchars($colaborador['APELLIDO_COLABORADOR'], ENT_QUOTES, 'UTF-8') ?></input>
            </div>

            <div class="form-group">
                <label for="correo">Correo Electronico:</label>
                <textarea class="form-control" id="correo" name="correo" required><?= htmlspecialchars($colaborador['CORREO'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <div class="form-group">
                <label for="id_puesto">Puesto:</label>
                <input type="text" class="form-control" id="id_puesto" name="id_puesto" value="<?= $colaborador['ID_PUESTO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_rol">Rol:</label>
                <input type="text" class="form-control" id="id_rol" name="id_rol" value="<?= $colaborador['ID_ROL'] ?>" required>
            </div>

            <<div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" id="telefono" name="telefono" value="<?= $colaborador['TELEFONO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="number" class="form-control" id="id_estado" name="id_estado" value="<?= $colaborador['ID_ESTADO'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar colaborador</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
