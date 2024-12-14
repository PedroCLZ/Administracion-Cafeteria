<?php
include_once 'header1.php';

require_once '../../models/CantonModel.php';

// Recibir los datos del formulario
$id_canton = $_POST['id_canton'];
$nombre_canton = $_POST['nombre'];
$id_provincia = $_POST['id_provincia'];
$estado = $_POST['estado'];

// Crear una instancia del modelo
$cantonModel = new CantonModel();

// Llamar al método para actualizar el cantón
$cantonModel->actualizarCanton($id_canton, $nombre_canton, $id_provincia, $estado);

// Redirigir a la vista de cantones después de la actualización
header('Location: cantonesView.php');
exit;
?>
