<?php
include_once 'models/ClientesModel.php';

class clienteController {

    // Mostrar todos los clientes
    public function mostrarClientes() {
        $clienteModel = new clientesModel();
        $clientes = $clienteModel->obtenerClientes();
        
        // Asegurarse de pasar la variable clientes a la vista
        include_once '../views/clienteView.php'; // Vista donde se mostrarán los clientes
    } 

    // Insertar un nuevo cliente
    public function insertarCliente($nombre, $correo_electronico, $telefono_cliente,$id_pais,
     $id_provincia, $id_canton, $id_distrito, $id_estado) {
        $clienteModel = new clientesModel();
        $clienteModel->insertarCliente($nombre, $correo_electronico, $telefono_cliente,
        $id_pais,$id_provincia, $id_canton, $id_distrito, $id_estado);
        header('Location: ../views/menu.php'); // Redirige después de la inserción
    }

    // Actualizar un cliente
    public function actualizarCliente($id_cliente, $nombre, $correo_electronico, $telefono_cliente,$id_pais,
    $id_provincia, $id_canton, $id_distrito, $id_estado) {
       $clienteModel = new clientesModel();
       $clienteModel->actualizarCliente($id_cliente, $nombre, 
       $correo_electronico, $telefono_cliente,
       $id_pais,$id_provincia, $id_canton,
        $id_distrito, $id_estado);
       header('Location: ../views/menu.php'); // Redirige después de la inserción
   }

    // Eliminar un cliente
    public function eliminarCliente($id_cliente) {
        $clienteModel = new clientesModel();
        $clienteModel->eliminarcliente($id_cliente);
        header('Location: ../views/menu.php'); // Redirige después de la eliminación
    }

}
?>
