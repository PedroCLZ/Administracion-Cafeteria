<?php
include_once 'models/promocionModel.php';

class promocionController {

    // Mostrar todos los promocion
    public function mostrarpromocion() {
        $promocionModel = new promocionModel();
        $promocion = $promocionModel->obtenerPromociones();
        
        // Asegurarse de pasar la variable promocion a la vista
        include_once '../views/promocionesView.php'; // Vista donde se mostrarán los promocion
    } 

    // Insertar una nueva promocion
    public function insertarPromocion($nombre_promocionre, $fecha_inicio, $fecha_fin,$id_producto,
     $id_descuento, $id_estado) {
        $promocionModel = new promocionModel();
        $promocionModel->insertarPromocion($nombre_promocionre, $fecha_inicio, $fecha_fin,
        $id_producto,$id_descuento, $id_estado);
        header('Location: ../views/menu.php'); // Redirige después de la inserción
    }

    // Actualizar una promocion
    public function actualizarPromocion($id_promocion, $nombre_promocion, $fecha_inicio, $fecha_fin, $id_producto , 
    $id_descuento, $id_estado) {
       $promocionModel = new promocionModel();
       $promocionModel->actualizarPromocion($id_promocion, $nombre_promocion, $fecha_inicio, $fecha_fin, $id_producto , 
       $id_descuento, $id_estado);
       header('Location: ../views/actualizarpromocion.php?id=' . $id_promocion); // Redirige a la vista de actualización
   }

    // Eliminar un cliente
    public function eliminarPromocion($id_promocion) {
        $promocionModel = new promocionModel();
        $promocionModel->eliminarPromocion($id_promocion);
        header('Location: ../views/menu.php'); // Redirige después de la eliminación
    }

}
?>
