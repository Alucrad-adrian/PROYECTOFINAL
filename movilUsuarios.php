<?php
include 'Conexionbase.php';

$Conexionbase = new ConexionBase();
$Conexionbase->conectar();



$sentencia = $Conexionbase->conexion->prepare("SELECT * FROM usuario ");
$sentencia->execute();

$resultado = $sentencia->get_result();
$usuarios=array();
while($fila=$resultado->fetch_assoc()){
    $usuarios[]=$fila;
}
echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);

$sentencia->close();
$Conexionbase->conexion->close();
?>
