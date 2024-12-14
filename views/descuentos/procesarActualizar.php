<?php
include_once '../../views/header1Developer.php'; // Ajusta la ruta si está en otro nivel de carpetas 
require_once '../../models/DescuentoModel.php';

// Recibir los datos del formulario
$id_descuento = $_POST['id_descuento'] ??  '';
$nombre_descuento = $_POST['nombre_descuento'] ?? '';
$descripcion_descuento = $_POST['descripcion_descuento'] ?? '';
$monto_descuento = $_POST['monto_descuento'] ?? '';
$id_estado = $_POST['id_estado'] ?? '';

// Crear una instancia del modelo
$descuentoModel = new DescuentoModel();

// Llamar al procedimiento almacenado para actualizar el descuento
$descuentoModel->actualizarDescuento($id_descuento, $nombre_descuento, $descripcion_descuento,
 $monto_descuento, $id_estado);

// Redirigir a la vista de descuentos después de la actualización
header('Location: descuentosView.php');
exit;

?> 