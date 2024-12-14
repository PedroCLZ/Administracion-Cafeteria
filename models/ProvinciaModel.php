<?php
include_once 'db_connection.php'; // Incluye la función connection()

class ProvinciaModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener una provincia por su ID
    public function obtenerProvinciaPorId($id_provincia) {
        $provincia = null;
        $query = "SELECT ID_PROVINCIA, NOMBRE_PROVINCIA, ID_PAIS, ID_ESTADO
                  FROM FIDE_PROVINCIA_TB WHERE ID_PROVINCIA = :id_provincia";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_provincia", $id_provincia);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
        } else {
            if ($row = oci_fetch_assoc($stmt)) {
                $provincia = $row;
            }
        }

        oci_free_statement($stmt);
        return $provincia;
    }

    // Obtener provincias activas
    public function obtenerProvincias() {
        $provincias = [];
        $query = "SELECT 
                      p.ID_PROVINCIA, 
                      p.NOMBRE_PROVINCIA, 
                      pais.NOMBRE_PAIS
                  FROM FIDE_PROVINCIA_TB p
                  JOIN FIDE_PAIS_TB pais ON p.ID_PAIS = pais.ID_PAIS
                  WHERE p.ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);
    
        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $provincias;
        }
    
        while ($row = oci_fetch_assoc($stmt)) {
            $provincias[] = $row;
        }
    
        oci_free_statement($stmt);
        return $provincias;
    }
    

    // Insertar una provincia
    public function insertarProvincia($nombre_provincia, $id_pais, $id_estado) {
        $query = "BEGIN SP_INSERTAR_PROVINCIA(:nombre_provincia, :id_pais, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":nombre_provincia", $nombre_provincia);
        oci_bind_by_name($stmt, ":id_pais", $id_pais);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar la provincia: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar una provincia
    public function actualizarProvincia($id_provincia, $nombre_provincia, $id_pais, $id_estado) {
        $query = "BEGIN SP_ACTUALIZAR_PROVINCIA(:id_provincia, :nombre_provincia, :id_pais, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_provincia", $id_provincia);
        oci_bind_by_name($stmt, ":nombre_provincia", $nombre_provincia);
        oci_bind_by_name($stmt, ":id_pais", $id_pais);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar la provincia: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar una provincia (cambia el estado a Inactivo)
    public function eliminarProvincia($id_provincia) {
        $query = "BEGIN SP_ELIMINAR_PROVINCIA(:id_provincia); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_provincia", $id_provincia);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar la provincia: " . $m['message'];
        }

        oci_free_statement($stmt);
    }
}
