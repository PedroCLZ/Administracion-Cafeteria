<?php
include_once 'db_connection.php'; // Incluye la función connection()

class ColaboradoresModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener un colaborador por su ID
    public function obtenerColaboradoresPorID($id_colaborador) {
        $colaborador = null;
        $query = "SELECT ID_COLABORADOR, NOMBRE_COLABORADOR, APELLIDO_COLABORADOR, CORREO,
        ID_PUESTO, ID_ROL,  TELEFONO
                  FROM FIDE_COLABORADORES_TB WHERE ID_COLABORADOR = :id_colaborador";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_colaborador", $id_colaborador);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
        } else {
            if ($row = oci_fetch_assoc($stmt)) {
                $colaborador = $row;
            }
        }

        oci_free_statement($stmt);
        return $colaborador;
    }

    public function obtenerColaboradores() {
        $colaboradores = [];
        $query = "SELECT ID_COLABORADOR, NOMBRE_COLABORADOR, APELLIDO_COLABORADOR, CORREO,
         ID_PUESTO, ID_ROL, TELEFONO
                  FROM FIDE_COLABORADORES_TB 
                  WHERE ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $colaboradores;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $colaboradores[] = $row;
        }

        oci_free_statement($stmt);
        return $colaboradores;
    }

    // Insertar un colaborador
    public function insertarColaborador($nombre_colaborador, $apellido_colaborador, $correo,$id_puesto,
    $id_rol, $telefono) {
        $query = "BEGIN SP_INSERTAR_COLABORADOR(:nombre_colaborador, :apellido_colaborador, :correo, :id_puesto,
        :id_rol, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":nombre_colaborador", $nombre_colaborador);
        oci_bind_by_name($stmt, ":apellido_colaborador", $apellido_colaborador);
        oci_bind_by_name($stmt, ":correo",$correo,);
        oci_bind_by_name($stmt, ":id_puesto", $id_puesto);
        oci_bind_by_name($stmt, ":id_rol", $id_rol);
        oci_bind_by_name($stmt, ":telefono", $telefono);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el colaborador: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar un producto
    public function actualizarColaborador($id_colaborador, $nombre_colaborador, $apellido_colaborador, $correo,$id_puesto,
    $id_rol, $telefono) {
        $query = "BEGIN SP_ACTUALIZAR_COLABORADOR(:id_colaborador, :nombre_colaborador, :apellido_colaborador, :correo, :id_puesto,
        :id_rol, :telefono, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_colaboardor", $id_colaborador);
        oci_bind_by_name($stmt, ":nombre_colaborador", $nombre_colaborador);
        oci_bind_by_name($stmt, ":apellido_colaborador", $apellido_colaborador);
        oci_bind_by_name($stmt, ":correo",$correo,);
        oci_bind_by_name($stmt, ":id_puesto", $id_puesto);
        oci_bind_by_name($stmt, ":id_rol", $id_rol);
        oci_bind_by_name($stmt, ":telefono", $telefono);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el cliente: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar un colaborador (cambia el estado a Inactivo)
    public function eliminarColaborador($id_colaborador) {
        $query = "BEGIN SP_ELIMINAR_COLABORADOR(:id_colaborador); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":id_colaborador", $id_colaborador);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el colaborador: " . $m['message'];
        }

        oci_free_statement($stmt);
    }
  
}
?>

