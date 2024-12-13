<?php
include_once 'header1.php';
require_once '../../models/ColaboradoresModel.php';

// Recibir los datos del formulario
$nombre_colaborador = $_POST['nombre_colaborador'] ?? '';
$apellido_colaborador = $_POST['apellido_colaborador'] ?? '';
$correo = $_POST['correo'] ?? '';
$id_puesto = $_POST['id_puesto'] ?? '';
$id_rol = $_POST['id_rol'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$id_estado = $_POST['id_estado'] ?? '';

// Crear una instancia del modelo
$colaboradorModel = new ColaboradoresModel();

// Llamar al procedimiento almacenado para actualizar el colaborador
$colaboradorModel->actualizarColaborador($nombre_colaborador, $apellido_colaborador, 
$correo, $id_puesto, $id_rol, $telefono, $id_estado);

// Redirigir a la vista de colaboradores después de la actualización
header('Location: colaboradorView.php');
exit;
?>
