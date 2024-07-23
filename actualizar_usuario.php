<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge los datos del formulario
    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $rol = $_POST['rol'];
    $carnet = $_POST['carnet'];

    // Conexión a la base de datos (ajusta estos valores según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bdweb";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuario SET nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', rol = '$rol', carnet = '$carnet' WHERE idUsuario = $idUsuario";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>