<?php
include_once 'models/ProductoModel.php';

class ProductoController {

    // Mostrar todos los productos
    public function mostrarProductos() {
        $productoModel = new ProductoModel();
        $productos = $productoModel->obtenerProductos();
        
        // Asegurarse de pasar la variable productos a la vista
        include_once '../views/productosView.php'; // Vista donde se mostrarán los productos
    }

    // Insertar un nuevo producto
    public function insertarProducto($nombre, $descripcion, $id_categoria, $precio, $id_proveedor, $id_estado) {
        $productoModel = new ProductoModel();
        $productoModel->insertarProducto($nombre, $descripcion, $id_categoria, $precio, $id_proveedor, $id_estado);
        header('Location: ../views/menu.php'); // Redirige después de la inserción
    }

    // Actualizar un producto
    public function actualizarProducto($id_producto, $nombre, $descripcion, $id_categoria, $precio, $id_proveedor, $id_estado) {
        $productoModel = new ProductoModel();
        $productoModel->actualizarProducto($id_producto, $nombre, $descripcion, $id_categoria, $precio, $id_proveedor, $id_estado);
        header('Location: ../views/menu.php'); // Redirige después de la actualización
    }

    // Eliminar un producto
    public function eliminarProducto($id_producto) {
        $productoModel = new ProductoModel();
        $productoModel->eliminarProducto($id_producto);
        header('Location: ../views/menu.php'); // Redirige después de la eliminación
    }


}
?>
