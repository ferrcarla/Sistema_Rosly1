<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Entradas</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <h5 class="card-title">Lista de Entradas</h5>
                <i class="fas fa-divide"></i>
                <div class="row">
                    <div class="col-12 d-flex flex-row-reverse">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroEntrada">
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
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($entradas as $entrada) : ?>
                                    <tr>
                                        <td><?php echo $entrada['Fecha_']; ?></td>
                                        <td><?php echo $entrada['nombre_usuario']; ?></td>
                                        <td><?php echo $entrada['Cantidad']; ?></td>
                                        <td><?php echo $entrada['Nombre_Art']; ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $entrada['Id_Entrada'] ?>)">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <!-- <a class="btn btn-secondary btn-sm" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $entrada['Id_Entrada'] ?>">
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
        $("#frmRegistro").validate({
            rules: {
                producto_id: {
                    required: true,
                },
                cantidad: {
                    required: true,
                    maxlength: 3,
                    number: true,
                },
            },
            submitHandler: function(form) {
                event.preventDefault();
                $.ajax({
                    url: '../../models/in/registro_model.php',
                    type: 'post',
                    data: $("#frmRegistro").serialize(),
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
                            window.location.href = '<?php echo CONTROLLER ?>in/index.php';
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
                producto_id: {
                    required: true,
                },
                cantidad: {
                    required: true,
                    maxlength: 3,
                    number: true,
                },
            },
            submitHandler: function(form) {
                event.preventDefault();
                $.ajax({
                    url: '../../models/in/editar_model.php',
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
                            window.location.href = '<?php echo CONTROLLER ?>in/index.php';
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
            url: '../../models/in/datos_entrada.php',
            type: 'POST',
            dataType: "json",
            data: {
                id: id
            }
        }).done(function(datos) {
            $("#id_entrada").val(id);
            $("#producto_edit option").each(function() {
                if ($(this).val() == datos['entrada']['Id_Entrada']) {
                    $(this).attr('selected', 'true');
                }
            });
            $("#frmEditar [id=cantidad_edit]").val(datos['entrada']['Cantidad']);
        }).fail(function(response) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'se produjo el siguiente error' + response,
            });
        });
    }
</script>