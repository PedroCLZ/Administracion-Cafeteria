<?php
require_once '../../models/ReservaModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar y convertir los valores de las variables a números antes de pasarlos a la base de datos
    $id_reserva = isset($_POST['id_reserva']) ? (int) $_POST['id_reserva'] : 0;
    $id_cliente = isset($_POST['id_cliente']) ? (int) $_POST['id_cliente'] : 0;
    $fecha_reserva = $_POST['fecha_reserva']; // Solo la fecha
    $cantidad_personas = isset($_POST['cantidad_personas']) ? (int) $_POST['cantidad_personas'] : 0;
    $estado = isset($_POST['id_estado']) ? (int) $_POST['id_estado'] : 0;

    // Validaciones básicas
    if ($cantidad_personas < 1) {
        die("La cantidad de personas debe ser mayor o igual a 1.");
    }

    // Crear el objeto de modelo
    $reservaModel = new ReservaModel();

    // Actualizar la reserva en la base de datos
    $reservaModel->actualizarReserva($id_reserva, $id_cliente, $fecha_reserva, $cantidad_personas, $estado);

    // Redirigir a la vista de reservas
    header("Location: /Administracion-Cafeteria/views/reservas/reservasView.php");
    exit;
}


// Obtener el ID de la reserva desde la URL para cargar los detalles
if (isset($_GET['id'])) {
    $id_reserva = $_GET['id'];

    // Crear el objeto de modelo
    $reservaModel = new ReservaModel();

    // Obtener los datos de la reserva desde la base de datos
    $reserva = $reservaModel->obtenerReservaPorId($id_reserva);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Actualizar Reserva</title>
</head>

<body>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container pt-5">
        <h2>Actualizar Reserva</h2>
        <form action="actualizarReserva.php" method="POST">
    <input type="hidden" name="id_reserva" value="<?php echo $reserva['ID_RESERVA']; ?>">

    <label for="id_cliente">ID Cliente:</label>
    <input type="number" name="id_cliente" value="<?php echo $reserva['ID_CLIENTE']; ?>" required><br>

    <label for="fecha_reserva">Fecha de Reserva:</label>
    <input type="date" name="fecha_reserva" value="<?php echo $reserva['FECHA_RESERVA']; ?>" required><br>

    <label for="cantidad_personas">Cantidad de Personas:</label>
    <input type="number" name="cantidad_personas" value="<?php echo $reserva['CANTIDAD_PERSONAS']; ?>" required min="1"><br>

    <label for="id_estado">Estado:</label>
    <input type="text" name="id_estado" value="<?php echo $reserva['ID_ESTADO']; ?>" required><br>

    <button type="submit">Actualizar</button>
</form>

    </div>
</body>

</html>

<?php
include_once '../footer.php';
?>