<?php
include_once 'db_connection.php'; // Incluye la función connection()

class ProductoModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    public function obtenerReservas() {
        $productos = [];
        $query = "SELECT ID_RESERVA, ID_CLIENTE, FECHA_RESERVA, CANTIDAD_PERSONAS 
                  FROM FIDE_RESERVAS_TB 
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