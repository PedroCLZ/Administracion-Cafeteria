<!DOCTYPE html>
<html>
<head>
    <title>Insertar Producto</title>
</head>
<body>
    <h1>Insertar Producto</h1>
    <form method="POST" action="?action=insertar">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea><br>
        <label>ID Categoría:</label>
        <input type="number" name="id_categoria" required><br>
        <label>Precio Unitario:</label>
        <input type="text" name="precio_unitario" required><br>
        <label>ID Proveedor:</label>
        <input type="number" name="id_proveedor" required><br>
        <label>ID Estado:</label>
        <input type="number" name="id_estado" required><br>
        <button type="submit">Insertar</button>
    </form>
</body>
</html>
