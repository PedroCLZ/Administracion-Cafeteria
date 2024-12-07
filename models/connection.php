<?php
// Crear conexión a Oracle
$conn = oci_connect("ProyectoAdmin", "Proyecto123", "//localhost/orcl"); //cambienlo por el de su oracle
if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}
// Cerrar la conexión
oci_close($conn);
?>