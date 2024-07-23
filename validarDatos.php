<?php  


    session_start(); //iniciando sesion

    

    include 'Conexionbase.php';

    $conexionBD = new Conexionbase();
    $conexionBD->conectar();    

    $valor1 = $_POST['valor1'];
    $valor2 = md5($_POST['valor2']);

    

    $sql = "select idUsuario,usuario,password,nombre,rol from usuario where usuario='$valor1' and password='$valor2'";
    $resultado = $conexionBD->conexion->query($sql);

   if($resultado->num_rows>0){

    /*datos de socio*/
    $fila = mysqli_fetch_assoc($resultado);
    $idUsuario = $fila['idUsuario'];
    $nombre = $fila['nombre'];
    $rol=$fila['rol'];


    /*Varibles de sesion*/
    $_SESSION['var_idUsuario'] = $idUsuario;
    $_SESSION['var_Nombre'] = $nombre;
    if ($rol=='Administrador'){
        ?>
        <script>
    window.location.href = "http://localhost/PROYECTOFINAL/main.php"; //redireccion hacia la pagina principal
    </script>
    <?php
    }
    else 
    if($rol=='Cliente')
    {?>
        <script>
    window.location.href = "http://localhost/PROYECTOFINAL/maincliente.php"; //redireccion hacia la pagina principal
    </script>
        <?php
    }
    if($rol=='Vendedor')
    {?>
        <script>
    window.location.href = "http://localhost/PROYECTOFINAL/mainvendedor.php"; //redireccion hacia la pagina principal
    </script>
        <?php
    }

    ?>
    
    <?php
    }else{
    ?>
    <div class="alert alert-warning">
        <strong>Advertencia!</strong> El usuario o password que ingreso no es el correcto
    </div>

    <?php
    }

?>