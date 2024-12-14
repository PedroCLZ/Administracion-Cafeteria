<?php
include_once 'header1.php';

require_once '../../models/ProvinciaModel.php';

// Recibir los datos del formulario
$id_provincia = $_POST['id_provincia'];
$nombre_provincia = $_POST['nombre'];
$id_pais = $_POST['id_pais'];
$id_estado = $_POST['estado'];

// Crear una instancia del modelo
$provinciaModel = new ProvinciaModel();

// Llamar al método para actualizar la provincia
$provinciaModel->actualizarProvincia($id_provincia, $nombre_provincia, $id_pais, $id_estado);

// Redirigir a la vista de provincias después de la actualización
header('Location: provinciasView.php');
exit;
?>
