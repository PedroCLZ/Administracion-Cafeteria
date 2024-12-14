<?php
include_once 'models/ProvinciaModel.php';

class ProvinciaController {

    // Mostrar todas las provincias activas
    public function mostrarProvincias() {
        $provinciaModel = new ProvinciaModel();
        $provincias = $provinciaModel->obtenerProvincias();

        // Pasar las provincias a la vista correspondiente
        include_once '../views/provinciasView.php'; // Vista para mostrar las provincias
    }


    // Insertar una nueva provincia
    public function insertarProvincia($nombre_provincia, $id_pais, $id_estado) {
        $provinciaModel = new ProvinciaModel();
        $provinciaModel->insertarProvincia($nombre_provincia, $id_pais, $id_estado);

        // Redirige después de la inserción
        header('Location: ../views/menu.php'); 
    }

    // Actualizar una provincia
    public function actualizarProvincia($id_provincia, $nombre_provincia, $id_pais, $id_estado) {
        $provinciaModel = new ProvinciaModel();
        $provinciaModel->actualizarProvincia($id_provincia, $nombre_provincia, $id_pais, $id_estado);

        // Redirige después de la actualización
        header('Location: ../views/menu.php');
    }

    // Eliminar una provincia (marcar como inactiva)
    public function eliminarProvincia($id_provincia) {
        $provinciaModel = new ProvinciaModel();
        $provinciaModel->eliminarProvincia($id_provincia);

        // Redirige después de la eliminación
        header('Location: ../views/menu.php');
    }

    // Mostrar una provincia por ID
    public function mostrarProvinciaPorId($id_provincia) {
        $provinciaModel = new ProvinciaModel();
        $provincia = $provinciaModel->obtenerProvinciaPorId($id_provincia);

        // Pasar la provincia a la vista correspondiente
        include_once '../views/provinciaDetalleView.php'; // Vista para mostrar los detalles de la provincia
    }
}
