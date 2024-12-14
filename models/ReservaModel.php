<?php
require_once 'db_connection.php';

class ReservaModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = connection();  // Utiliza OCI para la conexión
    }

    // Obtener todas las reservas
    public function obtenerReservas()
    {
        $sql = "SELECT * FROM FIDE_RESERVAS_TB";
        $stmt = oci_parse($this->conn, $sql);
        oci_execute($stmt);

        $reservas = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $reservas[] = $row;
        }

        oci_free_statement($stmt);
        return $reservas;
    }

    // Obtener una reserva por su ID
    public function obtenerReservaPorId($id_reserva)
    {
        $sql = "SELECT * FROM FIDE_RESERVAS_TB WHERE ID_RESERVA = :id_reserva";
        $stmt = oci_parse($this->conn, $sql);

        oci_bind_by_name($stmt, ':id_reserva', $id_reserva, -1, SQLT_INT);
        oci_execute($stmt);

        $reserva = oci_fetch_assoc($stmt);

        oci_free_statement($stmt);
        return $reserva;
    }

    // Insertar nueva reserva
    public function insertarReserva($id_cliente, $fecha_reserva, $cantidad_personas, $id_estado)
    {
        // Asegúrate de que la fecha esté en el formato adecuado
        $fecha_formateada = date('Y-m-d', strtotime($fecha_reserva)); // Convierte la fecha al formato 'YYYY-MM-DD'

        // Definir la consulta con TO_DATE para asegurar el formato adecuado
        $sql = "BEGIN SP_INSERTAR_RESERVA(
        p_id_cliente => :id_cliente,
        p_fecha_reserva => TO_DATE(:fecha_reserva, 'YYYY-MM-DD'), -- Asegura que el formato sea 'YYYY-MM-DD'
        p_cantidad_personas => :cantidad_personas,
        p_id_estado => :id_estado
    ); END;";

        // Preparar la consulta
        $stmt = oci_parse($this->conn, $sql);

        // Verificar errores al preparar la consulta
        if (!$stmt) {
            $error = oci_error($this->conn);
            die("Error en la preparación de la consulta: " . $error['message']);
        }

        // Asociar las variables con los parámetros de la consulta
        oci_bind_by_name($stmt, ':id_cliente', $id_cliente, -1);
        oci_bind_by_name($stmt, ':fecha_reserva', $fecha_formateada, -1); // Usar la fecha formateada
        oci_bind_by_name($stmt, ':cantidad_personas', $cantidad_personas, -1);
        oci_bind_by_name($stmt, ':id_estado', $id_estado, -1);

        // Ejecutar la consulta
        if (!oci_execute($stmt)) {
            $error = oci_error($stmt);
            die("Error al ejecutar la consulta: " . $error['message']);
        }

        // Liberar recursos
        oci_free_statement($stmt);
    }



    // Actualizar reserva
    // Actualizar reserva
    public function actualizarReserva($id_reserva, $id_cliente, $fecha_reserva, $cantidad_personas, $id_estado)
    {
        // Verificar que la fecha esté en el formato adecuado
        $fecha_formateada = date('Y-m-d', strtotime($fecha_reserva));
    
        // Verificar que los campos numéricos sean válidos
        if (!is_numeric($id_reserva) || !is_numeric($id_cliente) || !is_numeric($cantidad_personas) || !is_numeric($id_estado)) {
            die("Error: Los parámetros deben ser numéricos.");
        }
    
        if (empty($id_reserva) || empty($id_cliente) || empty($cantidad_personas) || empty($id_estado)) {
            die("Error: Los valores no pueden estar vacíos.");
        }
    
        // Consulta para actualizar la reserva con cantidad de personas
        $sql = "BEGIN SP_ACTUALIZAR_RESERVA(
                    p_id_reserva => :id_reserva,
                    p_id_cliente => :id_cliente,
                    p_fecha_reserva => TO_DATE(:fecha_reserva, 'YYYY-MM-DD'),
                    p_cantidad_personas => :cantidad_personas,
                    p_id_estado => :id_estado
                ); END;";
    
        // Preparar la consulta
        $stmt = oci_parse($this->conn, $sql);
    
        if (!$stmt) {
            $error = oci_error($this->conn);
            die("Error en la preparación de la consulta: " . $error['message']);
        }
    
        // Asociar las variables con los parámetros
        oci_bind_by_name($stmt, ':id_reserva', $id_reserva, -1);
        oci_bind_by_name($stmt, ':id_cliente', $id_cliente, -1);
        oci_bind_by_name($stmt, ':fecha_reserva', $fecha_formateada, -1);
        oci_bind_by_name($stmt, ':cantidad_personas', $cantidad_personas, -1);
        oci_bind_by_name($stmt, ':id_estado', $id_estado, -1);
    
        // Ejecutar la consulta
        if (!oci_execute($stmt)) {
            $error = oci_error($stmt);
            die("Error al ejecutar la consulta: " . $error['message']);
        }
    
        // Liberar recursos
        oci_free_statement($stmt);
    }
    



    // Eliminar reserva
    public function eliminarReserva($id_reserva)
{
    if (!is_numeric($id_reserva) || $id_reserva <= 0) {
        die("ID de reserva no válido.");
    }

    $sql = "BEGIN
    SP_ELIMINAR_RESERVA(
    p_id_reserva => :id_reserva
    );
    END;
    ";

    $stmt = oci_parse($this->conn, $sql);

    if (!$stmt) {
        $error = oci_error($this->conn);
        die("Error en la preparación de la consulta: " . $error['message']);
    }

    oci_bind_by_name($stmt, ':id_reserva', $id_reserva, -1);

    if (!oci_execute($stmt)) {
        $error = oci_error($stmt);
        die("Error al ejecutar la consulta: " . $error['message']);
    }

    oci_free_statement($stmt);
}

}
