<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KOPPEE - Coffee Shop HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Administracion-Cafeteria/css/style.css">

</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h2 class="text-center text-primary mb-4">Registro de Usuario</h2>
            <form method="POST" action="index.php?action=register">
                <div class="form-group mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario" required>
                </div>
                <div class="form-group mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                </div>
                <div class="form-group mb-4">
                    <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
                    <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
                        <option value="" disabled selected>Selecciona tu rol</option>
                        <option value="DESARROLLADOR">Desarrollador</option>
                        <option value="CLIENTE">Cliente</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </form>
            <p class="text-center mt-3">
                ¿Ya tienes cuenta? <a href="index.php" class="text-primary">Inicia sesión</a>
            </p>
        </div>
    </div>
</body>

</html>

<?php
include_once 'footer.php';

?>