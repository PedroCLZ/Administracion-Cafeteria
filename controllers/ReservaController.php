<?php
require_once 'C:\xampp\htdocs\Administracion-Cafeteria\models\ReservaModel.php';

class ReservasController {

    private $model;

    public function __construct($conn) {
        $this->model = new ReservaModel($conn);
    }

    // Mostrar todas las reservas
    public function mostrarReservas() {
        $cursor = $this->model->obtenerReservas();
        $reservas = [];
        while ($row = oci_fetch_assoc($cursor)) {
            $reservas[] = $row;
        }
        include 'views/listar_reservas.php';
    }

    // Mostrar una reserva por ID
    public function mostrarReserva($reserva_id) {
        $cursor = $this->model->obtenerReservaPorId($reserva_id);
        $reserva = oci_fetch_assoc($cursor);
        include 'views/ver_reserva.php';
    }

    // Crear una nueva reserva
    public function crearReserva($cliente_id, $fecha_reserva, $hora_reserva, $estado) {
        $this->model->insertarReserva($cliente_id, $fecha_reserva, $hora_reserva, $estado);
        header('Location: index.php?action=listar');
    }

    // Actualizar una reserva
    public function actualizarReserva($reserva_id, $cliente_id, $fecha_reserva, $hora_reserva, $estado) {
        $this->model->actualizarReserva($reserva_id, $cliente_id, $fecha_reserva, $hora_reserva, $estado);
        header('Location: index.php?action=listar');
    }

    // Eliminar una reserva
    public function eliminarReserva($reserva_id) {
        $this->model->eliminarReserva($reserva_id);
        header('Location: index.php?action=listar');
    }
}
?>
