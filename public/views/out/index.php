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
                    <div class="col-12">

                    </div>
                </div>
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
                        <?php foreach ($entradas as $entrada) : ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos()">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a class="btn btn-secondary btn-sm" href="#modalEliminar" role="button" data-toggle="modal" data-placement="top" title="Eliminar" onclick="eliminar_datos()">
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrar">Abrir modal</button>

<?php
require_once('registro_modal.php');
?>