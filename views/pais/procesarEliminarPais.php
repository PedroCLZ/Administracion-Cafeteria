<?php
require_once '../../models/PaisModel.php';

// Verifica si se recibió el ID del país
if (isset($_GET['id_pais'])) {
    $id_pais = $_GET['id_pais'];

    // Crea una instancia del modelo
    $paisModel = new PaisModel();

    // Llama al método para eliminar el país
    if ($paisModel->eliminarPais($id_pais)) {
        // Redirige a paisesView.php después de eliminar
        header('Location: paisesView.php?status=success');
        exit;
    } else {
        // Si hubo un error, redirige con un mensaje de error
        header('Location: paisesView.php?status=error');
        exit;
    }
} else {
    // Si no se especifica ID, redirige con un mensaje de error
    header('Location: paisesView.php?status=missing_id');
    exit;
}
