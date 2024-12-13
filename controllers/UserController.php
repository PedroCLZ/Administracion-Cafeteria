<?php
require_once 'models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function login($data) {
        try {
            $tipoUsuario = $this->model->loginUser($data['correo'], $data['contrasena']);
            if ($tipoUsuario) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['tipo_usuario'] = $tipoUsuario;
                include_once 'views/main.php';
                exit;
            } else {
                echo "Correo o contraseña incorrectos.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    public function register($data) {
        try {
            $this->model->registerUser(
                $data['nombre_usuario'],
                $data['contrasena'],
                $data['tipo_usuario'],
                $data['correo']
            );
            echo "Registro exitoso. <a href='index.php'>Iniciar sesión</a>";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}



?>
