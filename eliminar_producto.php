<?php
include 'Conexionbase.php';
$conexionBD = new ConexionBase();
$conexionBD->conectar();

$idProducto = $_POST['idProducto'];

$query = "DELETE FROM producto WHERE idProducto=$idProducto";
if ($conexionBD->conexion->query($query)) {
    echo "Producto eliminado con éxito.";
} else {
    echo "Error al eliminar el producto: " . $conexionBD->conexion->error;
}
?>
