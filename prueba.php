<?php
include 'Conexionbase.php';
$Conexionbase= new ConexionBase();
$Conexionbase->conectar();
$usuario=$_POST['usuario'];
$password=$_POST['password'];

//$usu_usuario="adrian";
//$usu_password="incos";

$sentencia=$Conexionbase->conexion->prepare("SELECT * FROM usuario WHERE usuario=? AND password=?");
$sentencia->bind_param('ss',$usuario,$password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
         echo json_encode($fila,JSON_UNESCAPED_UNICODE);     
}
$sentencia->close();
$Conexionbase->conexion->close();
?>