<?php 
include_once '../header1.php';
require_once '../../models/ClientesModel.php'; 

// Obtener el ID del cliente desde la URL
$id_cliente = $_GET['id']; 

// Obtener los datos del cliente desde el modelo
$clienteModel = new ClientesModel();
$cliente = $clienteModel->obtenerClientesPorId($id_cliente);

// Si no existe el cliente, redirigir o mostrar error
if (!$cliente) {
    header('Location: clienteView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Actualizar cliente</title>
</head>
<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px"> 
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Actualizar cliente</h2>
        <form action="procesarActualizar.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?= $cliente['ID_CLIENTE'] ?>">

            <div class="form-group">
                <label for="nombre_cliente">Nombre del cliente:</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="<?= htmlspecialchars($cliente['NOMBRE_CLIENTE'], ENT_QUOTES, 'UTF-8') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="correo_electronico">Correo Electronico:</label>
                <textarea class="form-control" id="correo_electronico" name="correo_electronico" required><?= htmlspecialchars($cliente['CORREO_ELECTRONICO'], ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <div class="form-group">
                <label for="telefono_cliente">Telefono:</label>
                <input type="number" class="form-control" id="telefono_cliente" name="telefono_cliente" value="<?= $cliente['TELEFONO_CLIENTE'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_pais">Pais:</label>
                <input type="text" class="form-control" id="id_pais" name="id_pais" value="<?= $cliente['ID_PAIS'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_provincia">Provincia:</label>
                <input type="text" class="form-control" id="id_provincia" name="id_provincia" value="<?= $cliente['ID_PROVINCIA'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_canton">Canton:</label>
                <input type="text" class="form-control" id="id_canton" name="id_canton" value="<?= $cliente['ID_CANTON'] ?>" required>
            </div>
            <div class="form-group">
                <label for="id_distrito">Distrito:</label>
                <input type="text" class="form-control" id="id_distrito" name="id_distrito" value="<?= $cliente['ID_DISTRITO'] ?>" required>
            </div>

            <div class="form-group">
                <label for="id_estado">Estado:</label>
                <input type="number" class="form-control" id="id_estado" name="id_estado" value="<?= $cliente['ID_ESTADO'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar cliente</button>
        </form>
    </div>
</body>
</html>

<?php
include_once '../footer.php';
?>
