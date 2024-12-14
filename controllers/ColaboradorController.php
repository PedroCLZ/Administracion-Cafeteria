<?php
include_once 'models/ColaboradoresModel.php';

class ColaboradorController {

    // Mostrar todos los colaboradores
    public function mostrarColaboradores() {
        $colaboradorModel = new colaboradoresModel();
        $colaboradores = $colaboradorModel->obtenerColaboradores();
        
        // Asegurarse de pasar la variable clientes a la vista
        include_once '../views/colaboradorView.php'; // Vista donde se mostrarán los colaboradores
    } 

    // Insertar un nuevo colaborador
    public function insertarColaborador($nombre_colaborador, $apellido_colaborador, $correo, $id_puesto,
     $id_rol, $telefono, $id_estado) {
        $colaboradorModel = new colaboradoresModel();
        $colaboradorModel->insertarColaborador($nombre_colaborador,
         $apellido_colaborador, $correo,$id_puesto,
         $id_rol, $telefono, $id_estado);
        header('Location: ../views/menu.php'); // Redirige después de la inserción
    }

    // Actualizar un colaborador
    public function actualizarColaborador($id_colaborador, $nombre_colaborador, $apellido_colaborador, 
    $correo,$id_puesto, $id_rol, $telefono, $id_estado) {
       $colaboradorModel = new colaboradoresModel();
       $colaboradorModel->actualizarColaborador($id_colaborador, $nombre_colaborador, $apellido_colaborador,
        $correo, $id_puesto,$id_rol, $telefono, $id_estado);
       header('Location: ../views/menu.php'); // Redirige después de la inserción
   }

    // Eliminar un cliente
    public function eliminarColaborador($id_colaborador) {
        $colaboradorModel = new colaboradoresModel();
        $colaboradorModel->eliminarColaborador($id_colaborador);
        header('Location: ../views/menu.php'); // Redirige después de la eliminación
    }

}
?>