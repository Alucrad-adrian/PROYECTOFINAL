<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mercadito Friki | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <script>
    function validarusuario(){
      $(document).ready(function()
        {
        const usuario = $("#usuario").val();
        const passw = $('#passw').val();

        console.log(usuario);
        console.log(passw);

        $.post("validarDatos.php",{valor1: usuario, valor2:passw},function(result){

          $("#validado").html(result);
          $('#validado').show();

        });
      });
    }

  </script>

</head>
<body class="hold-transition login-page"  style="background-color: rgb(149,210,211);" >
 
<div class="login-box">
  
  <div class="login-logo">
    <a href="../../index2.html"><b>Bienvenidos al Mercadito Friki</a>
  </div>
  <div id="validado"></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="background-color:rgb(39,132,171)">
      <div>
        <img src="img/friki.jpg" width="120" height="120" style="align-items: center; margin-left: 100px;">
      </div>
      <p class="login-box-msg" style="color:black">Ingresa con tu sesion</p>

      <form action="main.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user "style="color:black"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="passw" id="passw" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock "style="color:black"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" onclick="validarusuario()" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <div class="col-12">
            <a href="socios.php" style="color: white;" align="center">Registrarse</a></button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
</body>
</html>
