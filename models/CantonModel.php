<?php
include_once 'db_connection.php'; // Incluye la función connection()

class CantonModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener un cantón por su ID
    public function obtenerCantonPorId($id_canton) {
        $canton = null;
        $query = "SELECT ID_CANTON, NOMBRE_CANTON, ID_PROVINCIA, ID_ESTADO
                  FROM FIDE_CANTON_TB 
                  WHERE ID_CANTON = :id_canton";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_canton", $id_canton);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
        } else {
            if ($row = oci_fetch_assoc($stmt)) {
                $canton = $row;
            }
        }

        oci_free_statement($stmt);
        return $canton;
    }

    // Obtener todos los cantones activos
    public function obtenerCantones() {
        $cantones = [];
        $query = "SELECT c.ID_CANTON, c.NOMBRE_CANTON, p.NOMBRE_PROVINCIA
                  FROM FIDE_CANTON_TB c
                  JOIN FIDE_PROVINCIA_TB p ON c.ID_PROVINCIA = p.ID_PROVINCIA
                  WHERE c.ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $cantones;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $cantones[] = $row;
        }

        oci_free_statement($stmt);
        return $cantones;
    }

    // Insertar un cantón
    public function insertarCanton($nombre_canton, $id_provincia, $id_estado) {
        $query = "BEGIN SP_INSERTAR_CANTON(:nombre_canton, :id_provincia, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":nombre_canton", $nombre_canton);
        oci_bind_by_name($stmt, ":id_provincia", $id_provincia);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el cantón: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar un cantón
    public function actualizarCanton($id_canton, $nombre_canton, $id_provincia, $id_estado) {
        $query = "BEGIN SP_ACTUALIZAR_CANTON(:id_canton, :nombre_canton, :id_provincia, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_canton", $id_canton);
        oci_bind_by_name($stmt, ":nombre_canton", $nombre_canton);
        oci_bind_by_name($stmt, ":id_provincia", $id_provincia);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el cantón: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar un cantón (cambia el estado a Inactivo)
    public function eliminarCanton($id_canton) {
        $query = "BEGIN SP_ELIMINAR_CANTON(:id_canton); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_canton", $id_canton);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el cantón: " . $m['message'];
        }

        oci_free_statement($stmt);
    }
}
?>
