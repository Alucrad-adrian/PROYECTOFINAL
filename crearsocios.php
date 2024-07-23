<?php

include 'Conexionbase.php';
$Conexionbase= new ConexionBase();
$Conexionbase->conectar();

include 'header.php';
include 'sidebarmenuVacio.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="background-color: rgb(39,132,171)" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registro Clientes</h1>
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
        <!-- Campo confirmacion de registro -->
        <div class="confimacionInsert">
            
        </div>
        <div class="row">
          <div class="col-3">
            
          </div>
          <div class="col-6">
                <form action="" method="get">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text"
                        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">

                      <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <label for="apellidoPat">Apellido Paterno</label>
                              <input type="text"
                                class="form-control" name="apellidoPat" id="apellidoPat" aria-describedby="helpId" placeholder="">
                              
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                              <label for="apellidoMat">Apellido Materno</label>
                              <input type="text"
                                class="form-control" name="apellidoMat" id="apellidoMat" aria-describedby="helpId" placeholder="">
                              
                            </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-6">
                                <div class="form-group">
                                  <label for="telefono">Celular</label>
                                  <input type="text"
                                    class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="">
                                </div>
                          </div>
                          <div class="col-6">
                                <div class="form-group">
                                  <label for="Carnet">Carnet</label>
                                  <input type="text"
                                    class="form-control" name="carnet" id="carnet" aria-describedby="helpId" placeholder="">
                                </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-6">
                                <div class="form-group">
                                  <label for="usuario">Usuario</label>
                                  <input type="text"
                                    class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="">
                                </div>
                          </div>
                          <div class="col-6">
                                <div class="form-group">
                                  <label for="passw">Contraseña</label>
                                  <input type="password"
                                    class="form-control" name="passw" id="passw" aria-describedby="helpId" placeholder="">
                                </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-12">
                               <div class="form-group">
                                 <label for="rol">Correo</label>
                                 <input type="email"
                                    class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="">
                                </div>
                               </div>
                          </div>
                          
                      </div>

                      <div class="row">
                          <div class="col-12">
                               <div class="form-group">
                                 <label for="rol">Rol de usuario</label>
                                 <select class="form-control" name="rol" id="rol">
                                   <option>Administrador</option>
                                   <option>Vendedor</option>
                                   <option>Cliente</option>
                                   
                                 </select>
                               </div>
                          </div>
                          
                      </div>

                      <div class="row">
                        <div class="col-12">
                        <a name="" id="" onclick="insertarSocio();" class="btn btn-primary" href="index.php" role="button">Guardar datos</a>
                            
                        </div>
                      </div>
                    </div>
                </form>
          </div>
          <div class="col-3">
            
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  


  <?php
  include 'footer.php';
  ?>
