<?php
include_once 'header1.php';
require_once '../../models/PromocionesModel.php';

// Recibir los datos del formulario
$id_promocion = $_POST['id_promocion'];
$nombre_promocion = $_POST['nombre_promocion'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$id_producto = $_POST['id_producto'];
$id_descuento = $_POST['id_descuento'];
$id_estado = $_POST['id_estado'];

// Crear una instancia del modelo
$promocionModel = new PromocionModel();

// Llamar al procedimiento almacenado para actualizar la promocion
$promocionModel->actualizarPromocion($id_promocion, $nombre_promocion, 
$fecha_inicio,$fecha_fin, $id_producto, $id_descuento,  $id_estado);

// Redirigir a la vista de las promociones después de la actualización
header('Location: promocionView.php');
exit;
?>