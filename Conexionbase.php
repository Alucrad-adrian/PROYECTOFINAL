<?php

class ConexionBase{
private $Servidor="localhost";
private $usuario="root";
private $contraseña="";
private $basededatos="bdweb";

public $conexion;

public function conectar(){
    $this->conexion =new mysqli($this->Servidor, $this->usuario, $this->contraseña, $this->basededatos);
    if($this->conexion->connect_error){
        die("Error conexion: ".$this->conexion->connect_error);
    }
    else{
       // echo "conexiono Exitosa ";
    }
    
}

public function cerrarConexion(){
    if($this->conexion){
        $this->conexion->close();
    }
}
}
    $Conexionbase= new ConexionBase();
    $Conexionbase->conectar();
$Conexionbase->CerrarConexion();



?>