<?php
require_once '../../models/ProvinciaModel.php';

// Verifica si se recibió el ID de la provincia
if (isset($_GET['id_provincia'])) {
    $id_provincia = $_GET['id_provincia'];

    // Crea una instancia del modelo
    $provinciaModel = new ProvinciaModel();

    // Llama al método para eliminar la provincia
    if ($provinciaModel->eliminarProvincia($id_provincia)) {
        // Redirige con éxito
        header('Location: provinciasView.php?status=success');
        exit;
    } else {
        // Redirige con error
        header('Location: provinciasView.php?status=error');
        exit;
    }
} else {
    // Redirige si no se especifica ID
    header('Location: provinciasView.php?status=missing_id');
    exit;
}
