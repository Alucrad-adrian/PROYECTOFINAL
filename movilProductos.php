<?php
include 'Conexionbase.php';

$Conexionbase = new ConexionBase();
$Conexionbase->conectar();



$sentencia = $Conexionbase->conexion->prepare("SELECT * FROM producto ");
$sentencia->execute();

$resultado = $sentencia->get_result();
$productos=array();
while($fila=$resultado->fetch_assoc()){
    $productos[]=$fila;
}
echo json_encode($productos, JSON_UNESCAPED_UNICODE);

$sentencia->close();
$Conexionbase->conexion->close();
?>
