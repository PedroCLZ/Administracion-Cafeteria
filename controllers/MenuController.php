<?php
include_once 'models/ProductoModel.php';

class MenuController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();

    }

    public function mostrarMenu() {
        $productos = $this->productoModel->obtenerProductos();
        include 'views/menu.php'; // Incluye la vista del menú

    }
}
?>
