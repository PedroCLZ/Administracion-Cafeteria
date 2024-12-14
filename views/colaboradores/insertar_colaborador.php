<?php
include_once '../../views/header1Developer.php'; // Ajusta la ruta si está en otro nivel de carpetas
require_once '../../models/ColaboradoresModel.php';

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_colaborador = $_POST['nombre_colaborador'] ?? '';
    $apellido_colaborador = $_POST['apellido_colaborador'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $id_puesto = $_POST['id_puesto'] ?? '';
    $id_rol = $_POST['id_rol'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $id_estado = $_POST['id_estado'] ?? '';

    $colaboradorModel = new ColaboradoresModel(); 
    $colaboradorModel->insertarColaborador($nombre_colaborador, $apellido_colaborador, 
    $correo, $id_puesto, $id_rol,$telefono, $id_estado);

    // Redirigir después de insertar
    header('Location: colaboradorView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insertar Colaborador</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
</head>
<body>
     <!-- Page Header Start -->
     <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px"> 
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
    <button type="button" class="btn btn-primary" onclick="window.history.back();">
    <i class="fas fa-arrow-left"></i> </button>
    
        <h2>Agregar nuevo colaborador</h2>
        <form action="insertar_Colaborador.php" method="POST">
            <div class="form-group">
                <label for="nombre_colaborador">Nombre del colaborador:</label>
                <required class="form-control" id="nombre_colaborador" name="nombre_colaborador" value="<?= $colaborador['NOMBRE_COLABORADOR'] ?>" required>
            </div>
            
            <div class="form-group">
                <label for="apellido_colaborador">Apellido colaborador:</label>
                <required class="form-control" id="apellido_colaborador" name="apellido_colaborador" value ="<?= $colaborador['APELLIDO_COLABORADOR']?>" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo Electronico:</label>
                <required class="form-control" id="correo" name="correo" value="<?= $colaborador['CORREO']?>" required>
            </div>

            <div class="form-group">
                <label for="id_puesto">Puesto:</label>
                <required class="form-control" id="id_puesto" name="id_puesto" value="<?= $colaborador['ID_PUESTO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_rol">Rol:</label>
                <required class="form-control" id="id_rol" name="id_rol" value="<?= $colaborador['ID_ROL'] ?>" required>
            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" id="telefono" name="telefono" value="<?= $colaborador['TELEFONO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="number" class="form-control" id="id_estado" name="id_estado" value="<?= $colaborador['ID_ESTADO'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Colaborador</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
