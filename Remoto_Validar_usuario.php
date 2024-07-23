<?php 
header('Content-Type: aplication/json');
include 'Conexionbase.php';
$Conexionbase= new ConexionBase();
$Conexionbase->conectar();

$usuario=$_POST['usuario'];
$password=$_POST['password'];
//usuario='adrian';
//$password='incos';

$query = "SELECT idUsuario,usuario,password,nombre,rol from usuario where usuario='$usuario' and password='$password'";


$result=$Conexionbase->conexion->query($query);

if($result->num_rows){
   
    echo json_encode (array('success' => true, 'message' => 'inicio de sesion exitoso'));


}else{

    echo json_encode(array('success' => false, 'message' => 'usuario o contraseña incorrectos'));


}

$Conexionbase->conexion->close();
?> 