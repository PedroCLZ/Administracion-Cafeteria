<?php
include_once 'db_connection.php'; // Incluye la función connection()

class PaisModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener un país por su ID
    public function obtenerPaisPorId($id_pais) {
        $pais = null;
        $query = "SELECT ID_PAIS, NOMBRE_PAIS, ID_ESTADO
                  FROM FIDE_PAIS_TB WHERE ID_PAIS = :id_pais";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":id_pais", $id_pais);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
        } else {
            if ($row = oci_fetch_assoc($stmt)) {
                $pais = $row;
            }
        }

        oci_free_statement($stmt);
        return $pais;
    }
    
    // Obtener países activos
    public function obtenerPaises() {
        $paises = [];
        $query = "SELECT ID_PAIS, NOMBRE_PAIS 
                  FROM FIDE_PAIS_TB 
                  WHERE ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $paises;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $paises[] = $row;
        }

        oci_free_statement($stmt);
        return $paises;
    }

    // Insertar un país
    public function insertarPais($nombre_pais, $id_estado) {
        $query = "BEGIN SP_INSERTAR_PAIS(:nombre_pais, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":nombre_pais", $nombre_pais);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el país: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar un país
    public function actualizarPais($id_pais, $nombre_pais, $id_estado) {
        $query = "BEGIN SP_ACTUALIZAR_PAIS(:id_pais, :nombre_pais, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_pais", $id_pais);
        oci_bind_by_name($stmt, ":nombre_pais", $nombre_pais);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el país: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar un país (cambia el estado a Inactivo)
    public function eliminarPais($id_pais) {
        $query = "BEGIN SP_ELIMINAR_PAIS(:id_pais); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":id_pais", $id_pais);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el país: " . $m['message'];
        }

        oci_free_statement($stmt);
    }
}
?>
