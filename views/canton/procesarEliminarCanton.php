<?php
require_once '../../models/CantonModel.php';

// Verifica si se recibió el ID del cantón
if (isset($_GET['id_canton'])) {
    $id_canton = $_GET['id_canton'];

    // Crea una instancia del modelo
    $cantonModel = new CantonModel();

    // Llama al método para eliminar el cantón
    if ($cantonModel->eliminarCanton($id_canton)) {
        // Redirige a la vista de cantones con éxito
        header('Location: cantonesView.php?status=success');
        exit;
    } else {
        // Si hubo un error, redirige con mensaje de error
        header('Location: cantonesView.php?status=error');
        exit;
    }
} else {
    // Si no se especifica ID, muestra un mensaje de error
    header('Location: cantonesView.php?status=missing_id');
    exit;
}
