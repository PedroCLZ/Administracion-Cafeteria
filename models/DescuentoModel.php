<?php
include_once 'db_connection.php'; // Incluye la función connection()

class DescuentoModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener un descuento por su ID
    public function obtenerDescuentoPorID($id_descuento) {
        $query = "SELECT ID_DESCUENTO, NOMBRE, DESCRIPCION, MONTO_DESCUENTO, ID_ESTADO
                  FROM FIDE_DESCUENTO_TB WHERE ID_DESCUENTO = :id_descuento";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_descuento", $id_descuento);

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

    public function obtenerDescuentos() {
        $descuentos = [];
        $query = "SELECT ID_DESCUENTO, NOMBRE, DESCRIPCION, MONTO_DESCUENTO
                  FROM FIDE_DESCUENTO_TB 
                  WHERE ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $descuentos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $descuentos[] = $row;
        }

        oci_free_statement($stmt);
        return $descuentos;
    }

    // Insertar un descuento
    public function insertarDescuento($nombre_descuento, $descripcion_descuento, $monto_descuento, $id_estado) {
        $query = "BEGIN SP_INSERTAR_DESCUENTO(:nombre_descuento, :descripcion_descuento, :monto_descuento, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":nombre_descuento", $nombre_descuento);
        oci_bind_by_name($stmt, ":descripcion_descuento", $descripcion_descuento);
        oci_bind_by_name($stmt, ":monto_descuento",$monto_descuento);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el descuento: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar un descuento
    public function actualizarDescuento($id_descuento, $nombre_descuento, $descripcion_descuento, $monto_descuento, $id_estado) {
        $query = "BEGIN SP_ACTUALIZAR_DESCUENTO(:id_descuento, :nombre_descuento, :descripcion_descuento, :monto_descuento, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_descuento", $id_descuento);
        oci_bind_by_name($stmt, ":nombre_descuento", $nombre_descuento);
        oci_bind_by_name($stmt, ":descripcion_descuento", $descripcion_descuento);
        oci_bind_by_name($stmt, ":monto_descuento",$monto_descuento,);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el descuento: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar un descuento (cambia el estado a Inactivo)
    public function eliminarDescuento($id_descuento) {
        $query = "BEGIN SP_ELIMINAR_DESCUENTO(:id_descuento); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":id_descuento", $id_descuento);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el descuento: " . $m['message'];
        }

        oci_free_statement($stmt);
    }
 
}
?>