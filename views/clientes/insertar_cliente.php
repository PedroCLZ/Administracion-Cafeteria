<?php
require_once '../../models/ClientesModel.php';

// Manejar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_cliente = $_POST['nombre_cliente'] ?? '';
    $telefono_cliente = $_POST['telefono_cliente'] ?? '';
    $correo_electronico = $_POST['correo_electronico'] ?? '';
    $id_pais = $_POST['id_pais'] ?? '';
    $id_provincia = $_POST['id_provincia'] ?? '';
    $id_canton = $_POST['id_canton'] ?? '';
    $id_distrito = $_POST['id_distrito'] ?? '';
    $id_estado = $_POST['id_estado'] ?? '';

    $clienteModel = new ClientesModel();
    $clienteModel->insertarCliente($nombre_cliente, $telefono_cliente, 
    $correo_electronico, $id_pais, $id_provincia,
    $id_canton,$id_distrito, $id_estado);

    // Redirigir después de insertar
    header('Location: clienteView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insertar Cliente</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
    
        <h2>Agregar nuevo cliente</h2>
        <form action="insertar_Cliente.php" method="POST">
            <div class="form-group">
                <label for="nombre_cliente">Nombre del Cliente:</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required>
            </div>

            <div class="form-group">
                <label for="telefono_cliente">Telefono:</label>
                <textarea class="form-control" id="telefono_cliente" name="telefono_cliente" required></textarea>
            </div>

            <div class="form-group">
                <label for="correo_electronico">Correo Electronico:</label>
                <input type="text" class="form-control" id="correo_electronico" name="correo_electronico" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="id_pais">Pais:</label>
                <input type="text" class="form-control" id="id_pais" name="id_pais" required>
            </div>

            <div class="form-group">
                <label for="id_provincia">Provincia:</label>
                <input type="text" class="form-control" id="id_provincia" name="id_provincia" required>
            </div>

            <div class="form-group">
                <label for="id_canton">Canton:</label>
                <input type="text" class="form-control" id="id_canton" name="id_canton" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="text" class="form-control" id="id_estado" name="id_estado" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Cliente</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
