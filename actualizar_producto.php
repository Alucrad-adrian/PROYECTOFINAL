<?php
include 'Conexionbase.php';
$conexionBD = new ConexionBase();
$conexionBD->conectar();

$idProducto = $_POST['idProducto'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];


$query = "UPDATE producto SET nombre_producto='$nombre', descripcion='$descripcion', precio_unitario='$precio' WHERE idProducto=$idProducto";
if ($conexionBD->conexion->query($query)) {
    echo "Producto actualizado con éxito.";
} else {
    echo "Error al actualizar el producto: " . $conexionBD->conexion->error;
}
?>
