<?php
require_once 'db_connection.php';

class UserModel {
    private $conn;

    public function __construct() {
        $this->conn = connection();
    }

    public function loginUser($correo, $contrasena) {
        $stmt = oci_parse($this->conn, "BEGIN SP_LoginUsuario(:correo, :contrasena, :result); END;");
        oci_bind_by_name($stmt, ':correo', $correo);
        oci_bind_by_name($stmt, ':contrasena', $contrasena);
        oci_bind_by_name($stmt, ':result', $result, 32);

        if (!oci_execute($stmt)) {
            $error = oci_error($stmt);
            throw new Exception("Error al iniciar sesión: " . $error['message']);
        }

        oci_free_statement($stmt);
        return $result > 0;
    }
    public function registerUser($nombreUsuario, $contrasena, $tipoUsuario, $correo) {
        $stmt = oci_parse($this->conn, "BEGIN SP_RegistrarUsuario(:nombreUsuario, :contrasena, :tipoUsuario, :correo); END;");
        oci_bind_by_name($stmt, ':nombreUsuario', $nombreUsuario);
        oci_bind_by_name($stmt, ':contrasena', $contrasena);
        oci_bind_by_name($stmt, ':tipoUsuario', $tipoUsuario);
        oci_bind_by_name($stmt, ':correo', $correo);
    
        if (!oci_execute($stmt)) {
            $error = oci_error($stmt);
            throw new Exception("Error al registrar usuario: " . $error['message']);
        }
    
        oci_free_statement($stmt);
    }
    
}
?>
