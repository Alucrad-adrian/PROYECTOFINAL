<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoge el ID del usuario de la solicitud POST
    $idUsuario = $_POST['idUsuario'];

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

    // Consulta SQL para obtener los datos del usuario por ID
    $sql = "SELECT idUsuario, nombre, apellido1, apellido2, rol, carnet FROM usuario WHERE idUsuario = $idUsuario";

    // Ejecutar la consulta
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Recoge los datos del usuario
        $usuario = $result->fetch_assoc();

        // Responder con los datos en formato JSON
        echo json_encode($usuario);
    } else {
        echo "Usuario no encontrado.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}