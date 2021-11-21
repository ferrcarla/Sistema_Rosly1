<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
    </ol>
</nav>
<div class="container">
    <div class="row">
        <div class="card col-12">
            <div class="card-body">
                <h5 class="card-title">Lista de clientes</h5>
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
                                    <th>CI</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clientes as $cliente) : ?>
                                    <tr>
                                        <td><?php echo $cliente['CI_Cliente'] ?></td>
                                        <td><?php echo $cliente['Nombre_Cli'] ?></td>
                                        <td><?php echo $cliente['Apellido_Cli'] ?></td>
                                        <td><?php echo $cliente['Direccion'] ?></td>
                                        <td><?php echo $cliente['Correo'] ?></td>
                                        <td><?php echo $cliente['Telefono'] ?></td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $cliente['CI_Cliente'] ?>)">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a class="btn btn-secondary btn-sm" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos(<?php echo $cliente['CI_Cliente'] ?>)">
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
<script>
    $(document).ready(function() {
        $("#frmRegistro").validate({
            debug: true,
            rules: {
                nombre: {
                    required: true,
                    minlength: 3,
                    maxlength: 25,
                },
                apellido: {
                    required: true,
                    minlength: 3,
                    maxlength: 30,
                },
                ci: {
                    required: true,
                    minlength: 5,
                    remote: {
                        url: "../../models/client/verifica.php",
                        type: 'post',
                        data: {
                            ci: function() {
                                return $("#ci").val();
                            }
                        }
                    }
                }
            },
            messages: {
                nombre_usuario: {
                    remote: "Debe elegir otro nombre de usuario.",
                },
                ci: {
                    remote: "El numero de C.I. ya esta registrado verifique",
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '../../models/docente/registro_model.php',
                    type: 'post',
                    data: $("#frmRegistrar").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response) {
                        if (response == 1) {
                            $('#btnRegistrar').attr({
                                disabled: 'true'
                            });
                            $('#modal_Registrar').modal('hide');
                            transicionSalir();
                            mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ', 'success', 'GUARDAR DATOS');
                            setTimeout(function() {
                                window.location.href = '<?php echo ROOT_CONTROLLER ?>docente/index.php';
                            }, 3000);
                        } else {
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR verifique los datos!! ' + response, 'error', 'GUARDAR DATOS');
                        }
                    }
                });
            }
        });
        $('#frmEditar').validate({
            debug: true,
            rules: {
                nombre_usuario: {
                    required: true,
                    minlength: 3,
                    remote: {
                        url: "../../models/usuario/verifica.php",
                        type: 'post',
                        data: {
                            nombre_usuario: function() {
                                return $("#frmEditar [id=nombre_usuario]").val();
                            },
                            id_usuario: function() {
                                return $("#id_usuario").val();
                            },
                            tipo: "si",
                        }
                    }
                }
            },
            messages: {
                nombre_usuario: {
                    remote: "Debe elegir otro nombre de usuario.",
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '../../models/docente/editar_model.php',
                    type: 'post',
                    data: $("#frmEditar").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response) {
                        if (response == 1) {
                            $('#modalEditar').modal('hide');
                            $('#btnEditar').attr({
                                disabled: 'true'
                            });
                            transicionSalir();
                            mensajes_alerta('DATOS EDITADOS EXITOSAMENTE !! ', 'success', 'EDITAR DATOS');
                            setTimeout(function() {
                                window.location.href = '<?php echo ROOT_CONTROLLER ?>docente/index.php';
                            }, 3000);
                        } else {
                            transicionSalir();
                            mensajes_alerta('ERROR AL EDITAR EL USUARIO verifique los datos!! ' + response, 'error', 'EDITAR DATOS');
                        }
                    }
                });
            }
        });
        $("#btnEliminar").click(function(event) {
            $.ajax({
                url: '../../models/docente/eliminar_model.php',
                type: 'POST',
                data: $("#frmEliminar").serialize(),
                beforeSend: function() {
                    transicion("Procesando Espere....");
                },
                success: function(response) {
                    if (response == 1) {
                        $('#modalEliminar').modal('hide');
                        $('#btnEliminar').attr({
                            disabled: 'true'
                        });
                        transicionSalir();
                        mensajes_alerta('DATOS ELIMINADOS ELIMINADOS EXITOSAMENTE !! ', 'success', 'EDITAR DATOS');
                        setTimeout(function() {
                            window.location.href = '<?php echo ROOT_CONTROLLER ?>docente/index.php';
                        }, 3000);
                    } else {
                        transicionSalir();
                        mensajes_alerta('ERROR AL ELIMINAR AL DOCENTE verifique los datos!! ' + response, 'error', 'EDITAR DATOS');
                    }
                }
            });
        });
    });

    function obtener_datos(id) {
        $.ajax({
            url: '../../models/client/datos_docente.php',
            type: 'POST',
            dataType: "json",
            data: {
                id_docente: id
            },
            success: function(datos) {
                //console.log(datos);
                $("#frmEditar [id=nombre]").val(datos['docente']['nombre']);
                $("#frmEditar [id=paterno]").val(datos['docente']['paterno']);
                $("#frmEditar [id=materno]").val(datos['docente']['materno']);
                $("#frmEditar [id=celular]").val(datos['docente']['celular']);
                $("#frmEditar [id=nombre_usuario]").val(datos['docente']['nombre_usuario']);
                $("#id_role option").each(function() {
                    if ($(this).val() == datos['docente']['id_rol']) {
                        //console.log('ok: '+$(this).val());
                        $(this).attr('selected', 'true');
                    }
                });
                $("#id_docente").val(datos['docente']['id_docente']);
                $("#id_usuario").val(datos['docente']['id_usuario']);
            }
        });
    }

    function eliminar_datos(id) {
        $("#id_eliminar").val(id);
    }
</script>