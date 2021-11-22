<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmRegistro" method="post" action="#">
                    <div class="form-group">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" maxlength="15" required placeholder="Escribe nombre aqui">
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="col-form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" maxlength="30" required placeholder="Escribe apellido aqui">
                    </div>
                    <div class="form-group">
                        <label for="ci">CI</label>
                        <input type="text" class="form-control" id="ci" name="ci" required placeholder="ci">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="telefono" maxlength="10">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required placeholder="escribe tu email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección:</label>
                        <textarea class="form-control" id="direccion" name="direccion" placeholder="Dirección"></textarea>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="btnRegistrar">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>