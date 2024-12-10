<?php
function connection() {


    $conn = oci_connect("ProyectoAdmin", "Proyecto123", "localhost/xe","AL32UTF8");

    if (!$conn) {
        $m = oci_error();
        echo "Error al conectar a la base de datos: " . $m['message'];
        exit;
    }

    return $conn;
}
?>
