<?php
include_once 'header1.php';
require_once '../../models/ClientesModel.php';

// Recibir los datos del formulario
$id_cliente = $_POST['id_cliente'];
$nombre_cliente = $_POST['nombre_cliente'];
$telefono_cliente = $_POST['telefono_cliente'];
$correo_electronico = $_POST['correo_electronico'];
$id_pais = $_POST['id_pais'];
$id_provincia = $_POST['id_provincia'];
$id_canton = $_POST['id_canton'];
$id_distrito = $_POST['id_distrito'];
$id_estado = $_POST['id_estado']; 

// Crear una instancia del modelo
$clienteModel = new ClientesModel();

// Llamar al procedimiento almacenado para actualizar el producto
$clienteModel->actualizarCliente($id_cliente, $nombre_cliente, 
$correo_electronico,$telefono_cliente,
 $id_pais, $id_provincia, $id_canton,
  $id_distrito, $id_estado);

// Redirigir a la vista de productos después de la actualización
header('Location: clienteView.php');
exit;
?>
