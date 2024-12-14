<?php
include_once '../../views/header1.php';
require_once '../../models/PaisModel.php';

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $id_estado = $_POST['id_estado'] ?? '';

    // Crear una instancia del modelo y llamar al método de inserción
    $paisModel = new PaisModel();
    $paisModel->insertarPais($nombre, $id_estado);

    // Redirigir después de insertar
    header('Location: paisesView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insertar País</title>
</head>
<body>
     <!-- Page Header Start -->
     <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px"> 
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Agregar Nuevo País</h2>
        <form action="insertar_pais.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre del País:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="text" class="form-control" id="id_estado" name="id_estado" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar País</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
