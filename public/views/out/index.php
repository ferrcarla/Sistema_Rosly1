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
                                <?php foreach ($salidas as $salidas) : ?>
                                    <tr>
                                        <td><?php echo $salida['Nombre_Cli'] . ' ' . $salida['Apellido_Cli']; ?></td>
                                        <td><?php echo $salida['Fecha']; ?></td>
                                        <td><?php echo $salida['Cantidad']; ?></td>
                                        <td><?php echo $salida['Nombre_Art']; ?></td>
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
                alert('correcto');
            }
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