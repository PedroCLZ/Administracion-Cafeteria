<?php
include_once 'db_connection.php';

class ReservationModel {
    private $conn;

    public function __construct() {
        $this->conn = connection();
    }

    public function insertarReservacion($nombre_cliente, $email_cliente, $fecha_reservacion, $hora_reservacion) {
        // Procedimiento almacenado con formato TO_DATE
        $query = "BEGIN 
                      insertar_reservacion_online(
                          p_nombre_cliente => :nombre_cliente, 
                          p_email_cliente => :email_cliente, 
                          p_fecha_reservacion => TO_DATE(:fecha_reservacion, 'YYYY-MM-DD'), 
                          p_hora_reservacion => TO_DATE(:hora_reservacion, 'YYYY-MM-DD HH24:MI:SS')
                      ); 
                  END;";
        $stmt = oci_parse($this->conn, $query);
    
        // Binding de variables
        oci_bind_by_name($stmt, ":nombre_cliente", $nombre_cliente);
        oci_bind_by_name($stmt, ":email_cliente", $email_cliente);
        oci_bind_by_name($stmt, ":fecha_reservacion", $fecha_reservacion);
        oci_bind_by_name($stmt, ":hora_reservacion", $hora_reservacion);
    
        // Ejecutar el procedimiento
        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar la reservación: " . $m['message'];
            return false;
        }
    
        oci_free_statement($stmt);
        return true;
    }
    
}
?>
