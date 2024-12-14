<?php
include_once 'models/DistritoModel.php';

class DistritoController {

    // Mostrar todos los distritos activos
    public function mostrarDistritos() {
        $distritoModel = new DistritoModel();
        $distritos = $distritoModel->obtenerDistritos();

        // Pasar los distritos a la vista correspondiente
        include_once '../views/distritosView.php'; // Vista para mostrar los distritos
    }

    // Insertar un nuevo distrito
    public function insertarDistrito($nombre_distrito, $id_canton, $id_estado) {
        $distritoModel = new DistritoModel();
        $distritoModel->insertarDistrito($nombre_distrito, $id_canton, $id_estado);

        // Redirige después de la inserción
        header('Location: ../views/menu.php'); 
    }

    // Actualizar un distrito
    public function actualizarDistrito($id_distrito, $nombre_distrito, $id_canton, $id_estado) {
        $distritoModel = new DistritoModel();
        $distritoModel->actualizarDistrito($id_distrito, $nombre_distrito, $id_canton, $id_estado);

        // Redirige después de la actualización
        header('Location: ../views/menu.php');
    }

    // Eliminar un distrito (marcar como inactivo)
    public function eliminarDistrito($id_distrito) {
        $distritoModel = new DistritoModel();
        $distritoModel->eliminarDistrito($id_distrito);

        // Redirige después de la eliminación
        header('Location: ../views/menu.php');
    }

    // Mostrar un distrito por ID
    public function mostrarDistritoPorId($id_distrito) {
        $distritoModel = new DistritoModel();
        $distrito = $distritoModel->obtenerDistritoPorId($id_distrito);

        // Pasar el distrito a la vista correspondiente
        include_once '../views/distritoDetalleView.php'; // Vista para mostrar los detalles del distrito
    }
}
?>
