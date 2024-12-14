<?php
include_once 'db_connection.php'; // Incluye la función connection()

class DistritoModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener un distrito por su ID
    public function obtenerDistritoPorId($id_distrito) {
        $distrito = null;
        $query = "SELECT ID_DISTRITO, NOMBRE_DISTRITO, ID_CANTON, ID_ESTADO
                  FROM FIDE_DISTRITO_TB
                  WHERE ID_DISTRITO = :id_distrito";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_distrito", $id_distrito);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
        } else {
            if ($row = oci_fetch_assoc($stmt)) {
                $distrito = $row;
            }
        }

        oci_free_statement($stmt);
        return $distrito;
    }

    // Obtener todos los distritos activos
    public function obtenerDistritos() {
        $distritos = [];
        $query = "SELECT d.ID_DISTRITO, d.NOMBRE_DISTRITO, c.NOMBRE_CANTON
                  FROM FIDE_DISTRITO_TB d
                  JOIN FIDE_CANTON_TB c ON d.ID_CANTON = c.ID_CANTON
                  WHERE d.ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $distritos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $distritos[] = $row;
        }

        oci_free_statement($stmt);
        return $distritos;
    }

    // Insertar un distrito
    public function insertarDistrito($nombre_distrito, $id_canton, $id_estado) {
        $query = "BEGIN SP_INSERTAR_DISTRITO(:nombre_distrito, :id_canton, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":nombre_distrito", $nombre_distrito);
        oci_bind_by_name($stmt, ":id_canton", $id_canton);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el distrito: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar un distrito
    public function actualizarDistrito($id_distrito, $nombre_distrito, $id_canton, $id_estado) {
        $query = "BEGIN SP_ACTUALIZAR_DISTRITO(:id_distrito, :nombre_distrito, :id_canton, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_distrito", $id_distrito);
        oci_bind_by_name($stmt, ":nombre_distrito", $nombre_distrito);
        oci_bind_by_name($stmt, ":id_canton", $id_canton);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el distrito: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar un distrito (cambia el estado a Inactivo)
    public function eliminarDistrito($id_distrito) {
        $query = "BEGIN SP_ELIMINAR_DISTRITO(:id_distrito); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_distrito", $id_distrito);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el distrito: " . $m['message'];
        }

        oci_free_statement($stmt);
    }
}
?>
