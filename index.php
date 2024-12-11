<?php
require_once 'controllers/UserController.php';

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_GET['action'] ?? '';
    if ($action === 'login') {
        $controller->login($_POST);
    } elseif ($action === 'register') {
        $controller->register($_POST);
    }
} else {
    $action = $_GET['action'] ?? '';
    if ($action === 'register') {
        include_once 'views/register.php';
    } else {
        include_once 'views/login.php';
    }
}
?>
