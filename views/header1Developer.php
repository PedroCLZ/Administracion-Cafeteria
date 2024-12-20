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

<body>
    <!-- Navbar Start -->
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
                    <a href="about.php" class="nav-item nav-link">Nosotros</a>
                    <a href="service.php" class="nav-item nav-link">Servicios</a>
                    <a href="menu.php" class="nav-item nav-link">Menú</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Administracion</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="productos/productosView.php" class="dropdown-item">Productos</a>
                            <a href="clientes/clienteView.php" class="dropdown-item ">Clientes</a>
                            <a href="colaboradores/colaboradorView.php" class="dropdown-item">Colaboradores</a>
                            <a href="descuentos/descuentosView.php" class="dropdown-item">Descuentos</a>
                            <a href="promociones/promocionView.php" class="dropdown-item">Promociones</a>
                            <a href="reservation.php" class="dropdown-item">Reservación</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonios</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contacto</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->