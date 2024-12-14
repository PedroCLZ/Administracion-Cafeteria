<?php
include_once 'header1.php';

require_once '../../models/PaisModel.php';

// Recibir los datos del formulario
$id_pais = $_POST['id_pais'];
$nombre = $_POST['nombre'];
$id_estado = $_POST['id_estado'];

// Crear una instancia del modelo
$paisModel = new PaisModel();

// Llamar al procedimiento almacenado o método para actualizar el país
$paisModel->actualizarPais($id_pais, $nombre, $id_estado);

// Redirigir a la vista de países después de la actualización
header('Location: paisesView.php');
exit;
?>
