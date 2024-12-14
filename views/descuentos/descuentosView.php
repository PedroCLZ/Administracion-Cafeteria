<?php
include_once '../../views/header1Developer.php'; // Ajusta la ruta si está en otro nivel de carpetas
require_once '../../models/DescuentoModel.php';
 
// Obtener descuentos desde el modelo
$descuentoModel = new DescuentoModel();
$descuentos = $descuentoModel->obtenerDescuentos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>KOPPEE - Coffee Shop HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Administracion-Cafeteria/css/style.css">
    
</head>
<body><!-- Navbar Start -->
        <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="/Administracion-Cafeteria/index.php" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">Los Cafeteros</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="/Administracion-Cafeteria/index.php" class="nav-item nav-link">Inicio</a>
                    <a href="../about.php" class="nav-item nav-link active">Nosotros</a>
                    <a href="../service.php" class="nav-item nav-link">Servicios</a>
                    <a href="../menu.php" class="nav-item nav-link">Menú</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Administracion</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="../productos/productosView.php" class="dropdown-item">Productos</a>
                            <a href="../clientes/clienteView.php" class="dropdown-item ">Clientes</a>
                            <a href="../colaboradores/colaboradorView.php" class="dropdown-item ">Colaboradores</a>
                            <a href="../descuentos/descuentosView.php" class="dropdown-item">Descuentos</a>
                            <a href="../promociones/promocionView.php" class="dropdown-item">Promociones</a>
                            <a href="../reservation.php" class="dropdown-item">Reservacion</a>
                            <a href="../testimonial.php" class="dropdown-item">Testimonios</a>
                        </div>
                    </div>
                    <a href="../contact.php" class="nav-item nav-link">Contacto</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px"> 
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-fluid pt-5">
        <div class="container">
        <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Editar descuentos</h4>
                <h1 class="display-4">Lista de descuentos</h1>
            </div>

         <!-- Botón para agregar un nuevo descuento -->
        <div class="mb-3">
                <a href="insertar_Descuento.php" class="btn btn-success">Agregar descuentos</a>
            </div>

            <!-- Tabla de descuento -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Monto del descuento</th>
                        <th>Acción</th>     
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($descuentos)): ?>
                        <?php foreach ($descuentos as $descuento): ?>
                            <tr>
                                <td>
                                    <!-- Imagen de descuento -->
                                    
                                    <img class="w-100 rounded-circle" src="/Administracion-Cafeteria/img/bg.jpg" alt="Descuento" style="width: 100px; height: 100px;">
                                </td>
                                <td><?= htmlspecialchars($descuento['NOMBRE'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($descuento['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>₡<?= number_format($descuento['MONTO_DESCUENTO'], 2) ?></td>
                                <td>
                                    <!-- Botones de acción -->
                                    <a href="actualizarDescuento.php?id=<?= $descuento['ID_DESCUENTO'] ?>" class="btn btn-warning btn-sm">Actualizar</a>         
                                    <a href="eliminarDescuento.php?id=<?= $descuento['ID_DESCUENTO'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este descuento?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No hay descuentos disponibles en este momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>
</html>

<?php
include_once '../footer.php';
?>
