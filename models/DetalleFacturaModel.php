<?php
include_once 'db_connection.php'; // Incluye la función connection()

class ProductoModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    public function obtenerDetalleFactura() {
        $productos = [];
        $query = "SELECT ID_DETALLE_FACTURA, ID_FACTURA, ID_PRODUCTO, CANTIDAD, TOTAL 
                  FROM FIDE_DETALLE_FACTURA_TB 
                  WHERE ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

}
?>
