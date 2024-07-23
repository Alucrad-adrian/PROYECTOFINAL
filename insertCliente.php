<?php

$servername = "localhost"; // Cambia esto al nombre de tu servidor de base de datos
$username = "root"; // Cambia esto a tu nombre de usuario de la base de datos
$password = ""; // Cambia esto a tu contraseña
$database = "bdweb"; // Cambia esto a tu base de datos

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}




$usuario = $_POST['usuario'];
$passw = md5($_POST['passw']);
$nombre = $_POST['nombre'];
$apellidoPat = $_POST['apellidoPat'];
$apellidoMat = $_POST['apellidoMat'];
$rol = $_POST['rol'];
$correo = $_POST['correo'];
$carnet = $_POST['carnet'];


if (empty($rol)) {
    $rol = "Cliente";
}

$sql = "INSERT INTO usuario (usuario, password, nombre, apellido1, apellido2, rol, correo, carnet)
        VALUES ('$usuario', '$passw', '$nombre', '$apellidoPat', '$apellidoMat', '$rol', '$correo', '$carnet')";

if ($conn->query($sql) === TRUE) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>Datos Registrados</strong> La inserción fue correcta
    </div>
    <script>
      $(".alert").alert();
    </script>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
