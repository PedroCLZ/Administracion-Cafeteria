<?php
class ProductoModel {
    private $conn;

    public function __construct() {
        $this->conn = oci_connect("ProyectoAdmin", "Proyecto123", "//localhost/orcl", "AL32UTF8");
        if (!$this->conn) {
            $m = oci_error();
            echo "Error al conectar a la base de datos: " . $m['message'];
            exit;
        }
    }

    public function obtenerProductos() {
        $productos = [];
        $query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, DESCRIPCION, PRECIO_UNITARIO 
                  FROM FIDE_PRODUCTOS_TB 
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

    public function __destruct() {
        oci_close($this->conn);
    }
}
?>
