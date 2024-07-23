<?php

include 'header.php';
include 'sidebarmenucliente.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: orange;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Productos que vende Z-Store</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mercadito friki</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <h2>Figuras</h2>
            <br>
            <div class="row"><!-- /.row -->

                <div class="col-3"><!-- card 1 -->
                    <div class="card shadow">
                    <h5 class="card-title" align="center">Figura de goku</h5>
                        <img src="img/goku.jpg" style="margin-left: 40px; height: 200px; width:150px;">
                        <div class="card-body">
                            
                            <p class="card-text">descripcion</p><br>
                            <p class="card-text">precio .Bs</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-primary" onclick="abrirDetalles('figura de goku', 'img/goku.jpg', 'descripcion', 'precio')">detalles</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Repite las tarjetas de productos según sea necesario -->

            </div> <!-- fin row -->

            <!-- Modal para Detalles del Producto -->
            <div class="modal fade" id="detallesProducto" tabindex="-1" role="dialog" aria-labelledby="detallesProductoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detallesProductoLabel">¿Qué desearía hacer con este producto?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="productoNombre" class="mb-2"></div>
                            <img id="productoImagen" src="" style="width: 100%; height: auto;" class="mb-2">
                            <div id="productoDescripcion" class="mb-2"></div>
                            <div id="productoPrecio" class="mb-2"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary">Comprar</button>
                            <button type="button" class="btn btn-warning">Reservar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include 'footer.php';
?>

<script>
function abrirDetalles(nombre, imagen, descripcion, precio) {
    document.getElementById('productoNombre').innerText = nombre;
    document.getElementById('productoImagen').src = imagen;
    document.getElementById('productoDescripcion').innerText = descripcion;
    document.getElementById('productoPrecio').innerText = precio;
    $('#detallesProducto').modal('show');
}
</script>
