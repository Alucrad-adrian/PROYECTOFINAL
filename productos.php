<?php

include 'Conexionbase.php';
$Conexionbase= new ConexionBase();
$Conexionbase->conectar();

include 'header.php';
include 'sidebarmenuVacio.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="background-color: rgb(39,132,171);" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registro Productos</h1>
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
    <section class="content" >
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- Campo confirmacion de registro -->
        <div class="confimacionInsertproducto">
            
        </div>
        <div class="row">
          <div class="col-3">
            
          </div>
          <div class="col-6">
          <form action="insertarProducto.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="propietario">Propietario</label>
        <input type="text" class="form-control" name="propietario" id="propietario" aria-describedby="helpId" placeholder="">

        <label for="nombre">Nombre del producto</label>
        <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" aria-describedby="helpId" placeholder="">
        
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" aria-describedby="helpId" placeholder="">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
        </div>
        
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar datos</button>
            </div>
        </div>
    </div>
</form>



          </div>
          <div class="col-3">
            
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