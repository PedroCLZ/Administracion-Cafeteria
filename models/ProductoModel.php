<?php
include_once 'db_connection.php';

class ProductoModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    public function obtenerProductoPorId($id_producto) {
        // Asumiendo que estás utilizando un procedimiento almacenado o una consulta directa
        $query = "BEGIN SP_OBTENER_PRODUCTO_POR_ID(:id_producto, :nombre, :descripcion, :precio, :id_categoria, :id_proveedor, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);
    
        // Variables para almacenar los resultados del procedimiento almacenado
        $nombre = '';
        $descripcion = '';
        $precio = 0;
        $id_categoria = 0;
        $id_proveedor = 0;
        $id_estado = 0;
    
        oci_bind_by_name($stmt, ":id_producto", $id_producto);
        oci_bind_by_name($stmt, ":nombre", $nombre, 100); // Ajusta el tamaño según el campo
        oci_bind_by_name($stmt, ":descripcion", $descripcion, 255); // Ajusta el tamaño según el campo
        oci_bind_by_name($stmt, ":precio", $precio);
        oci_bind_by_name($stmt, ":id_categoria", $id_categoria);
        oci_bind_by_name($stmt, ":id_proveedor", $id_proveedor);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);
    
        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al obtener el producto: " . $m['message'];
        }
    
        oci_free_statement($stmt);
    
        // Verificar si se obtuvo el producto
        if (empty($nombre)) {
            return null;  // Producto no encontrado
        }
    
        // Devolver los datos obtenidos
        return [
            'NOMBRE_PRODUCTO' => $nombre,
            'DESCRIPCION' => $descripcion,
            'PRECIO_UNITARIO' => $precio,
            'ID_CATEGORIA' => $id_categoria,
            'ID_PROVEEDOR' => $id_proveedor,
            'ID_ESTADO' => $id_estado
        ];
    }
    
    
    
    
    // Obtener productos activos
    public function obtenerProductos() {
        $productos = [];
        $query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, DESCRIPCION, PRECIO_UNITARIO FROM FIDE_PRODUCTOS_TB WHERE ID_ESTADO = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Insertar un producto
    public function insertarProducto($nombre, $descripcion, $id_categoria, $precio, $id_proveedor, $id_estado) {
        $query = "BEGIN SP_INSERTAR_PRODUCTO(:nombre, :descripcion, :id_categoria, :precio, :id_proveedor, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":nombre", $nombre);
        oci_bind_by_name($stmt, ":descripcion", $descripcion);
        oci_bind_by_name($stmt, ":id_categoria", $id_categoria);
        oci_bind_by_name($stmt, ":precio", $precio);
        oci_bind_by_name($stmt, ":id_proveedor", $id_proveedor);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el producto: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar un producto
    public function actualizarProducto($id_producto, $nombre, $descripcion, $id_categoria, $precio, $id_proveedor, $id_estado) {
        $query = "BEGIN SP_ACTUALIZAR_PRODUCTO(:id_producto, :nombre, :descripcion, :id_categoria, :precio, :id_proveedor, :id_estado); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":id_producto", $id_producto);
        oci_bind_by_name($stmt, ":nombre", $nombre);
        oci_bind_by_name($stmt, ":descripcion", $descripcion);
        oci_bind_by_name($stmt, ":id_categoria", $id_categoria);
        oci_bind_by_name($stmt, ":precio", $precio);
        oci_bind_by_name($stmt, ":id_proveedor", $id_proveedor);
        oci_bind_by_name($stmt, ":id_estado", $id_estado);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el producto: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Eliminar un producto (cambia el estado a Inactivo)
    public function eliminarProducto($id_producto) {
        $query = "BEGIN SP_ELIMINAR_PRODUCTO(:id_producto); END;";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":id_producto", $id_producto);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el producto: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    
}
?>
