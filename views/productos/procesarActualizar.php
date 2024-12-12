<?php
include_once 'header1.php';

require_once '../../models/ProductoModel.php';

// Recibir los datos del formulario
$id_producto = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$id_categoria = $_POST['id_categoria'];
$precio = $_POST['precio'];
$id_proveedor = $_POST['id_proveedor'];
$id_estado = $_POST['id_estado'];

// Crear una instancia del modelo
$productoModel = new ProductoModel();

// Llamar al procedimiento almacenado para actualizar el producto
$productoModel->actualizarProducto($id_producto, $nombre, $descripcion, $id_categoria, $precio, $id_proveedor, $id_estado);

// Redirigir a la vista de productos después de la actualización
header('Location: productosView.php');
exit;
?>
