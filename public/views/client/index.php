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

<?php
require_once('registro_modal.php');
?>