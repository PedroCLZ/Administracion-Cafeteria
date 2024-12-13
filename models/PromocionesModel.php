<?php
include_once 'db_connection.php'; // Incluye la función connection() 

class PromocionModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener una promocion por su ID
    public function obtenerPromocionesPorID($id_promocion){
        $promocion= null;
        $query = "SELECT ID_PROMOCION, NOMBRE_PROMOCION, FECHA_INICIO, FECHA_FIN,
        ID_PRODUCTO, ID_DESCUENTO, ID_ESTADO
                  FROM FIDE_PROMOCIONES_TB WHERE ID_PROMOCION = :id_promocion";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_promocion", $id_promocion);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
        } else {
            if ($row = oci_fetch_assoc($stmt)) {
                $promocion = $row;
            }
        }

        oci_free_statement($stmt);
        return $promocion;
    }

    public function obtenerPromociones() {
        $promociones = [];
        $query = "SELECT ID_PROMOCION, NOMBRE_PROMOCION, FECHA_INICIO, FECHA_FIN, ID_PRODUCTO,
        ID_DESCUENTO
                  FROM FIDE_PROMOCIONES_TB";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $promociones;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $promociones[] = $row;
        }

        oci_free_statement($stmt);
        return $promociones;
    }

    // Insertar una promocion
    public function insertarPromocion($nombre_promocion, $fecha_inicio, $fecha_fin,$id_producto,
    $id_descuento,  $id_estado) {
        $query = "BEGIN SP_INSERTAR_PROMOCION(:nombre_promocion, :fecha_inicio, :fecha_fin, :id_producto,:id_descuento,
        :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":nombre_promocion", $nombre_promocion);
        oci_bind_by_name($stmt, ":fecha_inicio", $fecha_inicio);
        oci_bind_by_name($stmt, ":fecha_fin",$fecha_fin,);
        oci_bind_by_name($stmt, ":id_producto", $id_producto);
        oci_bind_by_name($stmt, ":id_descuento", $id_descuento);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar la promocion: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar una promocion
    public function actualizarPromocion($id_promocion, $nombre_promocion, $fecha_inicio, $fecha_fin, $id_producto , 
        $id_descuento, $id_estado) {
        $query = "BEGIN SP_ACTUALIZAR_PROMOCION(:id_promocion, :nombre_promocion, :fecha_inicio, :id_producto, 
        :id_descuento, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_promocion", $id_promocion);
        oci_bind_by_name($stmt, ":nombre_promocion", $nombre_promocion);
        oci_bind_by_name($stmt, ":fecha_inicio", $fecha_inicio);
        oci_bind_by_name($stmt, ":fecha_fin",$fecha_fin,);
        oci_bind_by_name($stmt, ":id_producto", $id_producto);
        oci_bind_by_name($stmt, ":id_descuento", $id_descuento);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar la promocion: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar una promocion (cambia el estado a Inactivo)
    public function eliminarPromocion($id_promocion) {
        $query = "BEGIN SP_ELIMINAR_PROMOCION(:id_promocion); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":id_promocion", $id_promocion);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el promocion: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

}
?>
