<?php
include_once 'models/PaisModel.php';

class PaisController {

    // Mostrar todos los países
    public function mostrarPaises() {
        $paisModel = new PaisModel();
        $paises = $paisModel->obtenerPaises();
        
        // Asegurarse de pasar la variable $paises a la vista
        include_once '../views/paisesView.php'; // Vista donde se mostrarán los países
    }

    // Insertar un nuevo país
    public function insertarPais($nombre_pais, $id_estado) {
        $paisModel = new PaisModel();
        $paisModel->insertarPais($nombre_pais, $id_estado);
        
        // Redirige después de la inserción
        header('Location: ../views/menu.php'); 
    }

    // Actualizar un país
    public function actualizarPais($id_pais, $nombre_pais, $id_estado) {
        $paisModel = new PaisModel();
        $paisModel->actualizarPais($id_pais, $nombre_pais, $id_estado);
        
        // Redirige después de la actualización
        header('Location: ../views/menu.php');
    }

    // Eliminar un país
    public function eliminarPais($id_pais) {
        $paisModel = new PaisModel();
        $paisModel->eliminarPais($id_pais);
        
        // Redirige después de la eliminación
        header('Location: ../views/menu.php');
    }

    // Mostrar un país por ID
    public function mostrarPaisPorId($id_pais) {
        $paisModel = new PaisModel();
        $pais = $paisModel->obtenerPaisPorId($id_pais);
        
        // Asegurarse de pasar la variable $pais a la vista
        include_once '../views/paisDetalleView.php'; // Vista para mostrar detalles del país
    }
}
?>
