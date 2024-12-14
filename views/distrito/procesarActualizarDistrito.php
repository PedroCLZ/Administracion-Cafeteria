<?php
require_once '../../models/DistritoModel.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idDistrito = $_POST['id_distrito'] ?? '';
    $nombreDistrito = $_POST['nombre_distrito'] ?? '';
    $idCanton = $_POST['id_canton'] ?? '';
    $estado = $_POST['estado'] ?? '';

    // Validar que todos los campos obligatorios están presentes
    if ($idDistrito && $nombreDistrito && $idCanton !== '' && $estado !== '') {
        $distritoModel = new DistritoModel();
        
        // Actualizar el distrito
        $distritoModel->actualizarDistrito($idDistrito, $nombreDistrito, $idCanton, $estado);

        // Redirigir al usuario de vuelta a la vista de distritos
        header('Location: distritosView.php');
        exit;
    } else {
        // Manejar el error si faltan datos
        echo "Error: Todos los campos son obligatorios.";
    }
} else {
    // Manejar el caso donde no se accede al script mediante POST
    header('Location: distritosView.php');
    exit;
}
?>
