<?php
require_once '../../models/DistritoModel.php';

// Verifica si se recibió el ID del distrito
if (isset($_GET['id_distrito'])) {
    $id_distrito = $_GET['id_distrito'];

    // Crea una instancia del modelo
    $distritoModel = new DistritoModel();

    // Llama al método para eliminar el distrito
    $distritoModel->eliminarDistrito($id_distrito);

    // Redirige a la vista de distritos después de la eliminación
    header('Location: distritosView.php');
    exit;
} else {
    echo "ID de distrito no especificado.";
}
