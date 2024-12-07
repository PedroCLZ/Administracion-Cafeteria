<?php
require_once 'models/ProductoModel.php';

class MenuController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
    }

    public function mostrarMenu() {
        // Obtener los productos desde el modelo
        $productos = $this->productoModel->obtenerProductos();

        // Cargar la vista del menú
        require_once 'views/menu.php';
    }
}
?>
