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

// Variables con los datos que quieres insertar en la base de datos
$propietario = $_POST['propietario'];
$nombre = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$habilitado = 1; // Valor predeterminado

// Manejo del archivo de imagen
$target_dir = "file/";
$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verificar si el archivo es una imagen real o un archivo falso
$check = getimagesize($_FILES["imagen"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    echo "El archivo no es una imagen.";
    $uploadOk = 0;
}

// Verificar si el archivo ya existe
if (file_exists($target_file)) {
    echo "Lo siento, el archivo ya existe.";
    $uploadOk = 0;
}

// Verificar el tamaño del archivo
if ($_FILES["imagen"]["size"] > 500000) {
    echo "Lo siento, tu archivo es demasiado grande.";
    $uploadOk = 0;
}

// Permitir ciertos formatos de archivo
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
    $uploadOk = 0;
}

// Verificar si $uploadOk es 0 debido a un error
if ($uploadOk == 0) {
    echo "Lo siento, tu archivo no se subió.";
} else {
    // Si todo está bien, intenta subir el archivo
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        // Insertar el producto en la base de datos
        $sql = "INSERT INTO producto (propietario, nombre_producto, descripcion, precio_unitario, categoria, habilitado, imagen) 
                VALUES ('$propietario', '$nombre', '$descripcion', '$precio', '$categoria', '$habilitado', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Datos Registrados </strong> La inserción fue correcta
            </div>
            <script>
                $(".alert").alert();
            </script>
            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

$conn->close();
?>
