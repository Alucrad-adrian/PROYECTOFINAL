<?php
// Conexión a la base de datos (ajusta estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$database = "bdweb";

// Verificar si se ha enviado un ID de usuario para eliminar
if (isset($_POST['idUsuario'])) {
    $idUsuario = $_POST['idUsuario'];

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar al usuario por ID
    $sql = "DELETE FROM usuario WHERE idUsuario = $idUsuario";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Cliente eliminado correctamente.";
    } else {
        echo "Error al eliminar el cliente: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
