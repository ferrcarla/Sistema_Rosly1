<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEditar" method="post">                    
                    <input type="hidden" name="id_cliente_before" id="id_cliente_before" class="form-control" value="">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_edit" name="nombre_edit" maxlength="15" required placeholder="Escribe nombre aqui">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido_edit" name="apellido_edit" maxlength="30" required placeholder="Escribe apellido aqui">
                    </div>
                    <div class="form-group">
                        <label for="ci">CI</label>
                        <input type="text" class="form-control" id="ci_edit" name="ci_edit" required placeholder="ci">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono_edit" name="telefono_edit" required placeholder="telefono" maxlength="10">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Correo</label>
                            <input type="email" class="form-control" id="correo_edit" name="correo_edit" required placeholder="escribe tu email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Dirección:</label>
                        <textarea class="form-control" id="direccion_edit" name="direccion_edit" placeholder="Dirección"></textarea>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" id="btnEditar">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>