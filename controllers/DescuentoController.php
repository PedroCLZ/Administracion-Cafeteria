<?php
include_once 'models/DescuentoModel.php';

class DescuentoController { 

    // Mostrar todos los descuentos
    public function mostrarDescuentos() {
        $descuentoModel = new DescuentoModel();
        $descuentos = $descuentoModel->obtenerDescuentos();
        
        // Asegurarse de pasar la variable descuentos a la vista
        include_once '../views/descuentosView.php'; // Vista donde se mostrarán los descuentos
    } 

    // Insertar un nuevo descuento
    public function insertarDescuento($nombre_descuento, $descripcion_descuento, $monto_descuento, $id_estado) {
        $descuentoModel = new DescuentoModel();
        $descuentoModel->insertarDescuento($nombre_descuento, $descripcion_descuento, $monto_descuento, $id_estado  );
        header('Location: ../views/menu.php'); // Redirige después de la inserción
    }

    // Actualizar un descuento
    public function actualizarDescuento($id_descuento, $nombre_descuento, $descripcion_descuento, $monto_descuento, $id_estado) {
       $descuentoModel = new DescuentoModel();
       $descuentoModel->actualizarDescuento($id_descuento, $nombre_descuento, $descripcion_descuento, $monto_descuento, $id_estado);
       header('Location: ../views/menu.php'); // Redirige después de la inserción
   }

    // Eliminar un descuento
    public function eliminarDescuento($id_descuento) {
        $descuentoModel = new DescuentoModel();
        $descuentoModel->eliminarDescuento($id_descuento);
        header('Location: ../views/menu.php'); // Redirige después de la eliminación
    }

}
?>
