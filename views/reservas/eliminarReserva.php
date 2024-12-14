<?php
require_once '../../models/ReservaModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_reserva = isset($_POST['id_reserva']) ? (int) $_POST['id_reserva'] : 0;

    if ($id_reserva <= 0) {
        die("ID de reserva no válido.");
    }

    $reservaModel = new ReservaModel();
    $reservaModel->eliminarReserva($id_reserva);

    header("Location: /Administracion-Cafeteria/views/reservas/reservasView.php");
    exit;
}
