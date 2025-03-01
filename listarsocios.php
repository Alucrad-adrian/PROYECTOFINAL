<?php
include 'header.php';
include 'sidebarmenu.php';

include 'Conexionbase.php';

 $conexionBD = new ConexionBase();
$conexionBD->conectar();    

$consultaSocio = "SELECT idUsuario,nombre,apellido1,apellido2,carnet,rol FROM usuario";

$datos=$conexionBD->conexion->query($consultaSocio);

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: rgb(149,210,211);">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listar Clientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mercadito Friki</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- Campo confirmacion de registro -->
        <div id="confimacionInsert">
            
        </div>
        <div class="row">
          <div class="col-1">
            
          </div>
          <div class="col-10">
                
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                <br>
                    <button type="button" class="btn btn-sm btn-primary csv">Export CSV</button>
                    <button type="button" class="btn btn-sm btn-primary sql">Export SQL</button>
                    <button type="button" class="btn btn-sm btn-primary txt">Export TXT</button>
                    <button type="button" class="btn btn-sm btn-primary json">Export JSON</button>
              </div>
              
<!-- Modal para Editar Usuario -->
<div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarUsuarioLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario para editar usuario -->
        <form id="formularioEditarUsuario">
          <input type="hidden" id="idUsuarioEditar" name="idUsuario">
          <div class="form-group">
            <label for="nombreEditar">Nombre</label>
            <input type="text" class="form-control" id="nombreEditar" name="nombre">
          </div>
          <div class="form-group">
            <label for="apellido1Editar">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido1Editar" name="apellido1">
          </div>
          <div class="form-group">
            <label for="apellido2Editar">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido2Editar" name="apellido2">
          </div>
          <div class="form-group">
            <label for="rolEditar">Rol</label>
            <input type="text" class="form-control" id="rolEditar" name="rol">
          </div>
          <div class="form-group">
            <label for="carnetEditar">Carnet</label>
            <input type="text" class="form-control" id="carnetEditar" name="carnet">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onClick='guardarCambiosUsuario()'>Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>


              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Rol</th>
                    <th>Carnet</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php

                        
                        while($fila = mysqli_fetch_assoc($datos)){
                            
                            echo "<tr>";
                                $idUsuario = $fila['idUsuario'];
                                
                                echo "<td>".$fila['nombre']."</td>";
                                echo "<td>".$fila['apellido1']."</td>";
                                echo "<td>".$fila['apellido2']."</td>";
                                echo "<td>".$fila['rol']."</td>";
                                echo "<td>".$fila['carnet']."</td>";

                                echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editarUsuario' onClick='editarUsuario($idUsuario)'><i class='fas fa-edit'></i> Editar</button></td>";
                                echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete' onClick='eliminarCliente($idUsuario)'><i class='fas fa-trash'></i>Eliminar</button></td>";
                           
                            echo "</tr>";
                        }
                      ?>
                      
                      <script>
    function eliminarCliente(idUsuario) {
        if (confirm("¿Estás seguro de que deseas eliminar este cliente?")) {
            // Realizar una solicitud AJAX para eliminar el cliente
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'eliminar_cliente.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert(xhr.responseText); // Muestra la respuesta del servidor
                    location.reload(); // Recarga la página para actualizar la tabla
                } else {
                    alert('Error al eliminar el cliente.');
                }
            };
            xhr.send('idUsuario=' + idUsuario);
        }
    }


    function editarUsuario(idUsuario) {
  // Realiza una solicitud AJAX para obtener los datos del usuario por ID
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'obtener_usuario.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      var usuario = JSON.parse(xhr.responseText);
      // Llena el formulario en el modal con los datos del usuario
      document.getElementById('idUsuarioEditar').value = usuario.idUsuario;
      document.getElementById('nombreEditar').value = usuario.nombre;
      document.getElementById('apellido1Editar').value = usuario.apellido1;
      document.getElementById('apellido2Editar').value = usuario.apellido2;
      document.getElementById('rolEditar').value = usuario.rol;
      document.getElementById('carnetEditar').value = usuario.carnet;
    } else {
      alert('Error al obtener los datos del usuario.');
    }
  };
  xhr.send('idUsuario=' + idUsuario);
}


function guardarCambiosUsuario() {
  // Recoge los datos del formulario
  var idUsuario = document.getElementById('idUsuarioEditar').value;
  var nombre = document.getElementById('nombreEditar').value;
  var apellido1 = document.getElementById('apellido1Editar').value;
  var apellido2 = document.getElementById('apellido2Editar').value;
  var rol = document.getElementById('rolEditar').value;
  var carnet = document.getElementById('carnetEditar').value;

  // Realiza una solicitud AJAX para actualizar los datos del usuario
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'actualizar_usuario.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert(xhr.responseText); // Muestra la respuesta del servidor
      location.reload(); // Recarga la página para actualizar la tabla
      $('#editarUsuario').modal('hide'); // Cierra el modal de edición
    } else {
      alert('Error al actualizar el usuario.');
    }
  };
  // Envía los datos del formulario al servidor
  var data = 'idUsuario=' + idUsuario + '&nombre=' + nombre + '&apellido1=' + apellido1 + '&apellido2=' + apellido2 + '&rol=' + rol + '&carnet=' + carnet;
  xhr.send(data);
}



</script>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Rol</th>
                    <th>Carnet</th>
                  </tr>
                  </tfoot>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-1">
            
          </div>
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
           
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
            <!--/.direct-chat -->

            <!-- TO DO List -->
           
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            
            <!-- /.card -->

            <!-- solid sales graph -->
           
            <!-- /.card -->

            <!-- Calendar -->
           
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


  <?php
  include 'footer.php';
  ?>