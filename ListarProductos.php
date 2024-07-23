<?php
session_start();
include 'header.php';
include 'sidebarmenu.php';

include 'Conexionbase.php';

$conexionBD = new ConexionBase();
$conexionBD->conectar();    

$consultaSocio = "SELECT idProducto,nombre_producto,descripcion,precio_unitario,categoria FROM producto";

$datos=$conexionBD->conexion->query($consultaSocio);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: rgb(149,210,211);">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Lista de Productos</h1>
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
        <div class="confimacionInsertproducto">
            
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
              
              <!-- Modal para Editar Producto -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateLabel">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario para editar producto -->
        <form id="formularioEditarProducto">
          <input type="hidden" id="idProductoEditar" name="idProducto">
          <div class="form-group">
            <label for="nombreEditar">Nombre</label>
            <input type="text" class="form-control" id="nombreEditar" name="nombre">
          </div>
          <div class="form-group">
            <label for="descripcionEditar">Descripción</label>
            <textarea class="form-control" id="descripcionEditar" name="descripcion"></textarea>
          </div>
          <div class="form-group">
            <label for="precioEditar">Precio</label>
            <input type="text" class="form-control" id="precioEditar" name="precio">
          </div>
          <div class="form-group">
            <label for="categoriaEditar">Categoría</label>
            <input type="text" class="form-control" id="categoriaEditar" name="categoria">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onClick='guardarCambiosProducto()'>Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Eliminar Producto -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabel">Eliminar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de que deseas eliminar este producto?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" onClick='confirmarEliminarProducto()'>Eliminar</button>
      </div>
    </div>
  </div>
</div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Categoria</th>
                    <th>Nombre</th>
                    <th>precio</th>
                    <th>Descripcion</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                      <?php

                        
                        while($fila = mysqli_fetch_assoc($datos)){
                            
                            echo "<tr>";
                                $idUsuario = $fila['idProducto'];
                                
                                echo "<td>".$fila['categoria']."</td>";
                                echo "<td>".$fila['nombre_producto']."</td>";
                                echo "<td>".$fila['precio_unitario']."</td>";
                                echo "<td>".$fila['descripcion']."</td>";

                                echo "<td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#update' onClick='actualizarReg($idUsuario)'><i class='fas fa-edit'></i></button></td>";
                            
                                echo "<td><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete' onClick='deleteReg($idUsuario)'><i class='fas fa-trash'></i></button></td>";
                           echo "</tr>";
                        }
                      ?>
                      <script>
function actualizarReg(idProducto) {
  // Realiza una solicitud AJAX para obtener los datos del producto por ID
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'obtener_producto.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      var producto = JSON.parse(xhr.responseText);
      // Llena el formulario en el modal con los datos del producto
      document.getElementById('idProductoEditar').value = producto.idProducto;
      document.getElementById('nombreEditar').value = producto.nombre_producto;
      document.getElementById('descripcionEditar').value = producto.descripcion;
      document.getElementById('precioEditar').value = producto.precio_unitario;
      document.getElementById('categoriaEditar').value = producto.categoria;
    } else {
      alert('Error al obtener los datos del producto.');
    }
  };
  xhr.send('idProducto=' + idProducto);
}

function guardarCambiosProducto() {
  // Recoge los datos del formulario
  var idProducto = document.getElementById('idProductoEditar').value;
  var nombre = document.getElementById('nombreEditar').value;
  var descripcion = document.getElementById('descripcionEditar').value;
  var precio = document.getElementById('precioEditar').value;
  var categoria = document.getElementById('categoriaEditar').value;

  // Realiza una solicitud AJAX para actualizar los datos del producto
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'actualizar_producto.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      alert(xhr.responseText); // Muestra la respuesta del servidor
      location.reload(); // Recarga la página para actualizar la tabla
      $('#update').modal('hide'); // Cierra el modal de edición
    } else {
      alert('Error al actualizar el producto.');
    }
  };
  // Envía los datos del formulario al servidor
  var data = 'idProducto=' + idProducto + '&nombre=' + nombre + '&descripcion=' + descripcion + '&precio=' + precio + '&categoria=' + categoria;
  xhr.send(data);
}

function deleteReg(idProducto) {
  // Configura el ID del producto para eliminar en el modal de confirmación
  document.getElementById('delete').setAttribute('data-idProducto', idProducto);
}

function confirmarEliminarProducto() {
  var idProducto = document.getElementById('delete').getAttribute('data-idProducto');
  if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
    // Realiza una solicitud AJAX para eliminar el producto
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'eliminar_producto.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        alert(xhr.responseText); // Muestra la respuesta del servidor
        location.reload(); // Recarga la página para actualizar la tabla
        $('#delete').modal('hide'); // Cierra el modal de eliminación
      } else {
        alert('Error al eliminar el producto.');
      }
    };
    xhr.send('idProducto=' + idProducto);
  }
}
</script>

                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Categoria</th>
                    <th>Nombre</th>
                    <th>tienda</th>
                    <th>Telefono</th>
                  </tr>
                  </tfoot>
                </table>
                    
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