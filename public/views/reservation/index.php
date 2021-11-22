<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Reservas</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <h5 class="card-title">Lista de Reservas</h5>
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
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>Producto</th>
                                    <th>fecha reserva</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>precio Total</th>                                    
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservas as $reserva) : ?>
                                    <tr>
                                        <td><?php echo $reserva['nombre_cliente'].' '.$reserva['apellido_cliente'] ?></td>
                                        <td><?php echo $reserva['Nombre'] ?></td>
                                        <td><?php echo $reserva['Nombre_Art'] ?></td>
                                        <td><?php echo $reserva['fecha_reser'] ?></td>
                                        <td><?php echo $reserva['cantidad'] ?></td>
                                        <td class="text-right"><?php echo number_format($reserva['precio_unitario'], 2) ?></td>
                                        <td class="text-right"><?php echo number_format($reserva['total'], 2) ?></td>
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
 $("#frmEditar").validate({
            rules: {
                clientes: {
                    required: true,
                },
                productos: {
                    required: true,
                },
                cantidad: {
                    required: true,
                   
                    transicionSalir();
                    $('#btnEditar').removeAttr('disabled');
                });
            }
        });
    });

    function obtener_datos(id) {
        $.ajax({
            url: '../../models/client/datos_cliente.php',
            type: 'POST',
            dataType: "json",
            data: {
                id_cliente: id
            }
        }).done(function(datos){            
            $("#id_cliente_before").val(id);
            $("#frmEditar [id=nombre_edit]").val(datos['cliente']['Nombre_Cli']);
            $("#frmEditar [id=apellido_edit]").val(datos['cliente']['Apellido_Cli']);
            $("#frmEditar [id=ci_edit]").val(datos['cliente']['CI_Cliente']);
            $("#frmEditar [id=telefono_edit]").val(datos['cliente']['Telefono']);
            $("#frmEditar [id=correo_edit]").val(datos['cliente']['Correo']);
            
            $("#direccion_edit").val(datos['cliente']['DIreccion']);
        }).fail(function (response){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'se produjo el siguiente error'+ response,                    
            });            
        });
    }

    function eliminar_datos(id) {
        // $("#id_eliminar").val(id);
    }
</script>