<?php
include 'Conexionbase.php';
$conexionBD = new ConexionBase();
$conexionBD->conectar();

$idProducto = $_POST['idProducto'];

$query = "SELECT * FROM producto WHERE idProducto = $idProducto";
$result = $conexionBD->conexion->query($query);

if ($result) {
    $producto = $result->fetch_assoc();
    echo json_encode($producto);
} else {
    echo json_encode(array('error' => 'No se encontraron datos'));
}
?>
