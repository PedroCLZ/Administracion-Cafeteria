<?php
include_once 'db_connection.php'; // Incluye la función connection()

class ClientesModel { 
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener un cliente por su ID
    public function obtenerClientesPorID($id_cliente) {
        $cliente = null;
        $query = "SELECT ID_CLIENTE, NOMBRE_CLIENTE, CORREO_ELECTRONICO, TELEFONO_CLIENTE,
        ID_PAIS, ID_PROVINCIA,  ID_CANTON, ID_DISTRITO
                  FROM FIDE_CLIENTES_TB WHERE ID_CLIENTE = :id_cliente";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_cliente", $id_cliente);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
        } else {
            if ($row = oci_fetch_assoc($stmt)) {
                $cliente = $row;
            }
        }

        oci_free_statement($stmt);
        return $cliente;
    }

    // Obtener clientes activos
    public function obtenerClientes() {
        $clientes = [];
        $query = "SELECT ID_CLIENTE, NOMBRE_CLIENTE, CORREO_ELECTRONICO, TELEFONO_CLIENTE
                  FROM FIDE_CLIENTES_TB 
                  WHERE ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $clientes;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $clientes[] = $row;
        }

        oci_free_statement($stmt);
        return $clientes;
    }

    // Insertar un producto
    public function insertarCliente($nombre, $correo_electronico, $telefono_cliente,$id_pais,
    $id_provincia, $id_canton, $id_distrito) {
        $query = "BEGIN SP_INSERTAR_CLIENTE(:nombre_cliente, :correo_electronico, :telefono_cliente, :id_pais,:id_provincia,
        :id_canton, :id_distrito, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":nombre_cliente", $nombre);
        oci_bind_by_name($stmt, ":correo_electronico", $correo_electronico);
        oci_bind_by_name($stmt, ":telefono_cliente",$telefono_cliente,);
        oci_bind_by_name($stmt, ":id_pais", $id_pais);
        oci_bind_by_name($stmt, ":id_provincia", $id_provincia);
        oci_bind_by_name($stmt, ":id_canton", $id_canton);
        oci_bind_by_name($stmt, ":id_distrito", $id_distrito);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el cliente: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar un producto
    public function actualizarCliente($id_cliente, $nombre, $correo_electronico, $telefono_cliente,$id_pais,
    $id_provincia, $id_canton, $id_distrito) {
        $query = "BEGIN SP_ACTUALIZAR_CLIENTE(:id_cliente, :nombre_cliente, :correo_electronico, :telefono_cliente, :id_pais,:id_provincia,
        :id_canton, :id_distrito, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_cliente", $id_cliente);
        oci_bind_by_name($stmt, ":nombre_cliente", $nombre);
        oci_bind_by_name($stmt, ":correo_electronico", $correo_electronico);
        oci_bind_by_name($stmt, ":telefono_cliente",$telefono_cliente,);
        oci_bind_by_name($stmt, ":id_pais", $id_pais);
        oci_bind_by_name($stmt, ":id_provincia", $id_provincia);
        oci_bind_by_name($stmt, ":id_canton", $id_canton);
        oci_bind_by_name($stmt, ":id_distrito", $id_distrito);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el cliente: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar un producto (cambia el estado a Inactivo)
    public function eliminarCliente($id_cliente) {
        $query = "BEGIN SP_ELIMINAR_CLIENTE(:id_cliente); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":id_cliente", $id_cliente);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el cliente: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    
}
?>

