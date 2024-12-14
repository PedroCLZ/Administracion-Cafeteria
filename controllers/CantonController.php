<?php
include_once 'models/CantonModel.php';

class CantonController {

    // Mostrar todos los cantones activos
    public function mostrarCantones() {
        $cantonModel = new CantonModel();
        $cantones = $cantonModel->obtenerCantones();

        // Pasar los cantones a la vista correspondiente
        include_once '../views/cantonesView.php'; // Vista para mostrar los cantones
    }

    // Insertar un nuevo cantón
    public function insertarCanton($nombre_canton, $id_provincia, $id_estado) {
        $cantonModel = new CantonModel();
        $cantonModel->insertarCanton($nombre_canton, $id_provincia, $id_estado);

        // Redirige después de la inserción
        header('Location: ../views/menu.php'); 
    }

    // Actualizar un cantón
    public function actualizarCanton($id_canton, $nombre_canton, $id_provincia, $id_estado) {
        $cantonModel = new CantonModel();
        $cantonModel->actualizarCanton($id_canton, $nombre_canton, $id_provincia, $id_estado);

        // Redirige después de la actualización
        header('Location: ../views/menu.php');
    }

    // Eliminar un cantón (marcar como inactivo)
    public function eliminarCanton($id_canton) {
        $cantonModel = new CantonModel();
        $cantonModel->eliminarCanton($id_canton);

        // Redirige después de la eliminación
        header('Location: ../views/menu.php');
    }

    // Mostrar un cantón por ID
    public function mostrarCantonPorId($id_canton) {
        $cantonModel = new CantonModel();
        $canton = $cantonModel->obtenerCantonPorId($id_canton);

        // Pasar el cantón a la vista correspondiente
        include_once '../views/cantonDetalleView.php'; // Vista para mostrar los detalles del cantón
    }
}
