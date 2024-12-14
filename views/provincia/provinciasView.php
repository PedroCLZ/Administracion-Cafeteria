<?php
require_once '../../models/ProvinciaModel.php';

// Obtener provincias desde el modelo
$provinciaModel = new ProvinciaModel();
$provincias = $provinciaModel->obtenerProvincias();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>KOPPEE - Lista de Provincias</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Administracion-Cafeteria/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="/Administracion-Cafeteria/index.php" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="/Administracion-Cafeteria/index.php" class="nav-item nav-link">Home</a>
                    <a href="../about.php" class="nav-item nav-link ">About</a>
                    <a href="../service.php" class="nav-item nav-link">Service</a>
                    <a href="../menu.php" class="nav-item nav-link">Menú</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="../productos/productosView.php" class="dropdown-item ">Productos</a>
                            <a href="../clientes/clienteView.php" class="dropdown-item ">Clientes</a>
                            <a href="../colaboradores/colaboradorView.php" class="dropdown-item ">Colaboradores</a>
                            <a href="../pais/paisesView.php" class="dropdown-item ">Paises</a>
                            <a href="../provincia/provinciasView.php" class="dropdown-item ">Provincias</a>
                            <a href="../canton/cantonesView.php" class="dropdown-item ">Cantones</a>
                            <a href="../distrito/distritosView.php" class="dropdown-item ">Distritos</a>
                            <a href="../reservation.php" class="dropdown-item">Reservation</a>
                            <a href="../testimonial.php" class="dropdown-item">Testimonial</a>
                            
                        </div>
                    </div>
                    <a href="../contact.php" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
    </div>

    <!-- Encabezado -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 text-white">Lista de Provincias</h1>
        </div>
    </div>

    <!-- Contenido -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Editar Provincias</h4>
                <h1 class="display-4">Gestión de Provincias</h1>
            </div>

            <!-- Botón para agregar una nueva provincia -->
            <div class="mb-3">
                <a href="insertar_Provincia.php" class="btn btn-success">Agregar Provincia</a>
            </div>

            <!-- Tabla de provincias -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>País</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($provincias)): ?>
                        <?php foreach ($provincias as $provincia): ?>
                            <tr>
                                <td><?= htmlspecialchars($provincia['ID_PROVINCIA'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($provincia['NOMBRE_PROVINCIA'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($provincia['NOMBRE_PAIS'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <a href="actualizar_provincia.php?id=<?= $provincia['ID_PROVINCIA'] ?>" class="btn btn-warning btn-sm">Actualizar</a>
                                    <a href="procesarEliminarProvincia.php?id_pais=<?= $provincia['ID_PROVINCIA'] ?>"
                                        onclick="return confirm('¿Estás seguro de eliminar esta provincia?')"
                                        class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay provincias disponibles en este momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
