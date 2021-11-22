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
<?php require_once('editar_modal.php'); ?>

<script>
    $(document).ready(function() {        
        $("#frmRegistro").validate({
            rules: {
                nombre: {
                    required: true,
                    minlength: 3,
                    maxlength: 25
                },
                apellido: {
                    required: true,
                    minlength: 3,
                    maxlength: 30
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
                },
                direccion: {
                    required: true
                },
                telefono: {
                    required: true,
                    number: true,
                    minlength: 8,
                    maxlength: 10
                }
            },
            messages: {
                ci: {
                    remote: "El numero de C.I. ya esta registrado verifique"
                }
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $.ajax({
                    url: '../../models/client/registro_model.php',
                    type: 'post',
                    data: $("#frmRegistro").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                        $('#btnRegistrar').attr({
                            disabled: 'true'
                        });
                    }                    
                }).done(function(response){                    
                    if (response == 1) {
                        $('#btnRegistrar').attr({
                            disabled: 'true'
                        });                        
                        transicionSalir();
                        mensajes_alerta('DATOS GUARDADOS EXITOSAMENTE !! ', 'success', 'GUARDAR DATOS');
                        transicion("Procesando Espere....");
                        setTimeout(function() {
                            window.location.href = '<?php echo CONTROLLER ?>client/index.php';
                        }, 3000);
                    } else {
                        transicionSalir();
                        mensajes_alerta('ERROR AL REGISTRAR verifique los datos!! ' + response, 'error', 'GUARDAR DATOS');
                    }
                }).fail(function (response){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al registrar',
                        text: 'se produjo el siguiente error'+ response,                    
                    })                  
                    transicionSalir();
                    $('#btnRegistrar').removeAttr('disabled');
                });
            }
        });
        
        $("#frmEditar").validate({
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
                            },
                            type: 1
                        }
                    }
                },
                direccion: {
                    required: true,
                },
                telefono: {
                    required: true,
                    number: true,
                    minlength: 8,
                    maxlength: 10,
                }
            },
            messages: {
                ci: {
                    remote: "El numero de C.I. ya esta registrado verifique",
                },
            },
            submitHandler: function(form) {
               alert('correcto');            
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
            },
            success: function(datos) {
                $("#frmEditar [id=nombre_edit]").val(datos['cliente']['Nombre_Cli']);
                $("#frmEditar [id=apellido_edit]").val(datos['cliente']['paterno']);
                $("#frmEditar [id=materno]").val(datos['cliente']['materno']);
                $("#frmEditar [id=celular]").val(datos['cliente']['celular']);
                $("#frmEditar [id=nombre_usuario]").val(datos['cliente']['nombre_usuario']);
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
        // $("#id_eliminar").val(id);
    }
</script>