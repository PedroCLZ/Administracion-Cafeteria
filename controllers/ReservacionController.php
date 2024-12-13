<?php
include_once '../models/ReservacionModel.php';

class ReservationController {
    private $reservationModel;

    public function __construct() {
        $this->reservationModel = new ReservationModel();
    }

    public function realizarReservacion($nombre_cliente, $email_cliente, $fecha_reservacion, $hora_reservacion) {
        $resultado = $this->reservationModel->insertarReservacion($nombre_cliente, $email_cliente, $fecha_reservacion, $hora_reservacion);
        if ($resultado) {
            $_SESSION['mensaje'] = "Reservación realizada exitosamente.";
        } else {
            $_SESSION['mensaje'] = "Hubo un problema al realizar la reservación.";
        }
    }
}
?>
