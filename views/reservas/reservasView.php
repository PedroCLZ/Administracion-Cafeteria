<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['tipo_usuario'])) {
    if ($_SESSION['tipo_usuario'] === 'DESARROLLADOR') {
        include '../header1Developer.php';
    } else {
        include '../header1Client.php';
    }
} else {
    echo "Error: Usuario no autenticado.";
    exit;
}
require_once '../../models/ReservaModel.php';

// Obtener las reservas desde el modelo
$reservaModel = new ReservaModel();
$reservas = $reservaModel->obtenerReservas();
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
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px"> 
        </div>
    </div>
    <!-- Page Header End -->
<body>
<div class="container-fluid pt-5">
        <div class="container">
        <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Editar reservas</h4>
                <h1 class="display-4">Lista de Reservas</h1>
            </div>
    <div>
        <a href="insertarReserva.php" class="btn btn-success">Agregar Reserva</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Reserva</th>
                <th>Cliente</th>
                <th>Fecha Reserva</th>
                <th>Cantidad Personas</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?= htmlspecialchars($reserva['ID_RESERVA'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($reserva['ID_CLIENTE'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($reserva['FECHA_RESERVA'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($reserva['CANTIDAD_PERSONAS'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <a href="actualizarReserva.php?id=<?= $reserva['ID_RESERVA'] ?>" class="btn btn-warning btn-sm">Actualizar</a>
                        <a href="eliminarReserva.php?id=<?= $reserva['ID_RESERVA'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta reserva?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
