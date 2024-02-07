<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('/public/assets/favicon.ico') ?>" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('/public/css/styles.css') ?>" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Repaso Examen</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Shortcuts</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Overview</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <h2>Productos</h2>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Proveedor</th>
                        <th>Categoria</th>
                        <th>Producto</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    foreach ($datos as $key) {
                    ?>
                        <tr>
                            <td><?php echo $key->PROD_ID ?></td>
                            <td><?php echo $key->PROV_NOMBRE ?></td>
                            <td><?php echo $key->CAT_NOMBRE ?></td>
                            <td><?php echo $key->PROD_NOMBRE ?></td>
                            <td>
                                <!-- modal editar, capturar solo id -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar<?php echo $key->PROD_ID ?>">
                                    Editar
                                </button>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

                <!-- modales -->
                <?php
                foreach ($datos as $key) {
                ?>
                    <div class="modal fade" id="editar<?php echo $key->PROD_ID ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Producto ID <?php echo $key->PROD_ID ?></h4>
                                </div>
                                <div class="modal-body">
                                    <!-- nombre -->
                                    <label for="nombre">Nombre Proveedor:</label>
                                    <input type="text" name="txtNombre" id="txt 
                                        Nombre" value="<?php echo $key->PROV_NOMBRE ?>" class="form-control" readonly>
                                    <br>
                                    <!-- id -->
                                    <label for="id">ID Producto</label>
                                    <input type="text" name="txtIdProd" id="txtIdProd" value="<?php echo $key->PROD_ID ?>" class="form-control" readonly>

                                    <!-- id producto -->
                                    <label for="idProducto">ID Proveedor</label>
                                    <input type="num" name="txtIdProv" id="txtIdProv" value="<?php echo $key->PROV_ID ?>" class="form-control">

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="save">Guardar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>




        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- editar con ajax del modal -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#save').click(function() {
                    var idProducto = $('#txtIdProd').val();
                    var idProveedor = $('#txtIdProv').val();

                    $.ajax({
                        url: "<?php echo base_url() ?>updateProveedor/" + idProveedor + "/" + idProducto,
                        method: "POST",
                        success: function(response) {
                            if (response.success) {
                                alert('Actualización exitosa');
                            } else {
                                alert('Error en la actualización: ' + response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Error en la solicitud AJAX: ' + status + ' ' + error);
                        }
                    });
                });
            });
        </script>
<!-- boton con modal -->
            
        <script src="<?php echo base_url() . '/public/js/scripts.js' ?>">
        </script>
</body>

</html>