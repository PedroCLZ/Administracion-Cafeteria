<?php
include_once 'db_connection.php';

class ProductoModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener un producto por su ID
    public function obtenerProductoPorId($id_producto) {
        $producto = null;
        $query = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, DESCRIPCION, PRECIO_UNITARIO, ID_CATEGORIA, ID_PROVEEDOR, ID_ESTADO 
                  FROM FIDE_PRODUCTOS_TB WHERE ID_PRODUCTO = :id_producto";
        $stmt = oci_parse($this->conn, $query);
        
        oci_bind_by_name($stmt, ":id_producto", $id_producto);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
        } else {
            if ($row = oci_fetch_assoc($stmt)) {
                $producto = $row;
            }
        }

        oci_free_statement($stmt);
        return $producto;
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
