<?php
$Servidor="localhost";
$usuario="root";
$contraseña="";
$basededatos="bdweb";

$conn =new mysqli($Servidor, $usuario, $contraseña, $basededatos);

$nombreProducto = 'nana';
$descripcion = '1/4 de tamaño';
$precioUnitario = 500; // Reemplaza 500 con el precio correcto
$categoria='figura';

// Consulta SQL para insertar datos en la tabla 'producto'
$sql_producto = "INSERT INTO producto (nombre_producto, descripcion, precio_unitario, categoria) 
                VALUES ('$nombreProducto', '$descripcion', '$precioUnitario', '$categoria')";

// Ejecuta la consulta SQL para insertar el producto
if ($conn->query($sql_producto) === TRUE) {
    echo "Producto insertado con éxito";
} else {
    echo "Error al insertar el producto: " . $conn->error;
}

$conn->close();
?>