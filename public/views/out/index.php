<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Salidas</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <h5 class="card-title">Salidas</h5>
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
                                    <th>Fecha</th>
                                    <th>Cantidad</th>
                                    <th>Articulo</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($salidas as $salida) : ?>
                                    <tr>
                                        <td><?php echo $salida['Nombre_Cli'] . ' ' . $salida['Apellido_Cli']; ?></td>
                                        <td><?php echo $salida['Fecha']; ?></td>
                                        <td><?php echo $salida['Cantidad']; ?></td>
                                        <td><?php echo $salida['Nombre_Art']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $salida['Id_Salida'] ?>)">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <!-- <a class="btn btn-secondary btn-sm" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar">
                                                <i class="bi bi-trash-fill"></i>
                                            </a> -->
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
        $("#frmRegistrar").validate({
            rules: {
                clientes: {
                    required: true,
                },
                productos: {
                    required: true,
                },
                cantidad: {
                    required: true,
                    maxlength: 3,
                    number: true
                },
            },
            submitHandler: function(form) {
                event.preventDefault();
                $.ajax({
                    url: '../../models/out/registro_model.php',
                    type: 'post',
                    data: $("#frmRegistrar").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                        $('#btnRegistrar').attr({
                            disabled: 'true'
                        });
                    }
                }).done(function(response) {
                    if (response == 1) {
                        $('#btnRegistrar').attr({
                            disabled: 'true'
                        });
                        transicionSalir();
                        mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ', 'success', 'GUARDAR DATOS');
                        transicion("Procesando Espere....");
                        setTimeout(function() {
                            window.location.href = '<?php echo CONTROLLER ?>out/index.php';
                        }, 3000);
                    } else {
                        transicionSalir();
                        mensajes_alerta('ERROR AL REGISTRAR verifique los datos!! ' + response, 'error', 'GUARDAR DATOS');
                    }
                }).fail(function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al registrar',
                        text: 'se produjo el siguiente error' + response,
                    })
                    transicionSalir();
                    $('#btnRegistrar').removeAttr('disabled');
                });
            }
        });

        $("#frmEditar").validate({
            rules: {
                clientes_edit: {
                    required: true,
                },
                productos: {
                    required: true,
                },
                cantidad: {
                    required: true,
                    maxlength: 3,
                    number: true
                },
            },
            submitHandler: function(form) {
                event.preventDefault();
                $.ajax({
                    url: '../../models/out/editar_model.php',
                    type: 'post',
                    data: $("#frmEditar").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                        $('#btnEditar').attr({
                            disabled: 'true'
                        });
                    }
                }).done(function(response) {
                    if (response == 1) {
                        $('#btnEditar').attr({
                            disabled: 'true'
                        });
                        transicionSalir();
                        mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ', 'success', 'GUARDAR DATOS');
                        transicion("Procesando Espere....");
                        setTimeout(function() {
                            window.location.href = '<?php echo CONTROLLER ?>out/index.php';
                        }, 3000);
                    } else {
                        transicionSalir();
                        mensajes_alerta('ERROR AL REGISTRAR verifique los datos!! ' + response, 'error', 'GUARDAR DATOS');
                    }
                }).fail(function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al registrar',
                        text: 'se produjo el siguiente error' + response,
                    })
                    transicionSalir();
                    $('#btnEditar').removeAttr('disabled');
                });
            }
        });

    });


    function obtener_datos(id) {
        $.ajax({
            url: '../../models/out/datos_salida.php',
            type: 'POST',
            dataType: "json",
            data: {
                id: id
            }
        }).done(function(datos) {
            $("#id").val(id);
            $("#clientes_edit option").each(function() {
                if ($(this).val() == datos['salida']['CI_Cliente']) {
                    $(this).attr('selected', 'true');
                }
            });
            $("#productos_edit option").each(function() {
                if ($(this).val() == datos['salida']['Id_Articulo']) {
                    $(this).attr('selected', 'true');
                }
            });
            $("#frmEditar [id=cantidad_edit]").val(datos['salida']['Cantidad']);
        }).fail(function(response) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'se produjo el siguiente error' + response,
            });
        });
    }
</script>