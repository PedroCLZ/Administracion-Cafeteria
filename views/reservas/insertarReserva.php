<?php
include_once 'C:\xampp\htdocs\Administracion-Cafeteria\controllers\ReservaController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $cantidad_personas = $_POST['cantidad_personas'];
    $id_estado = $_POST['id_estado'];

    $reservaModel = new ReservaModel();
    $reservaModel->insertarReserva($id_cliente, $fecha_reserva, $cantidad_personas, $id_estado);

    
    header('Location: reservasView.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insertar Reserva</title>
</head>
<body>
    <h2>Agregar Nueva Reserva</h2>
    <form action="insertarReserva.php" method="POST">
        <div class="form-group">
            <label for="id_cliente">ID Cliente:</label>
            <input type="number" class="form-control" id="id_cliente" name="id_cliente" required>
        </div>

        <div class="form-group">
            <label for="fecha_reserva">Fecha de Reserva:</label>
            <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
        </div>

        <div class="form-group">
            <label for="cantidad_personas">Cantidad de Personas:</label>
            <input type="number" class="form-control" id="cantidad_personas" name="cantidad_personas" required>
        </div>



        <div class="form-group">
            <label for="id_estado">Estado:</label>
            <input type="number" class="form-control" id="id_estado" name="id_estado" required>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Reserva</button>
    </form>
</body>
</html>
