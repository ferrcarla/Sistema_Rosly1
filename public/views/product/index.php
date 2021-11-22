<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Productos</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <h5 class="card-title">Lista de Productos</h5>
                <i class="fas fa-divide"></i>
                <div class="row">
                    <div class="col-12 d-flex flex-row-reverse">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrar">
                            <i class="bi bi-node-plus-fill"></i> Nuevo
                        </button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="display table table-light" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Color</th>
                                    <th>Talla</th>
                                    <th>Detalle</th>
                                    <th>cantidad</th>
                                    <th>precio</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $producto) : ?>
                                    <tr>
                                        <td><?php echo $producto['Nombre_Art'] ?></td>
                                        <td><?php echo $producto['Nombre'] ?></td>
                                        <td><?php echo $producto['Color_Art'] ?></td>
                                        <td><?php echo $producto['Talla_Art'] ?></td>
                                        <td><?php echo $producto['detalle'] ?></td>
                                        <td><?php echo $producto['catidad'] ?></td>
                                        <td><?php echo $producto['precio'] ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a class="btn btn-secondary btn-sm" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('registro_modal.php'); ?>
<?php require_once('editar_modal.php'); ?>

<script>
    $(document).ready(function() {
        $("#frmRegistro").validate({
            rules: {
                NOMBRE: {
                    required: true,
                    maxlength: 15
                },
                imagen: {
                    required: true                    
                },
                categoria: {
                    required: true
                },
                talla: {
                    required: true
                },
                color: {
                    required: true
                },
                descripcion: {
                    required: true,
                    maxlength: 10,
                    maxlength: 50,
                    minlength: 5
                },
                precio: {
                    required: true,
                    maxlength: 4
                }
            },                
            submitHandler: function(form) {
               alert('correcto');            
            }
        });
    });

    
</script>
