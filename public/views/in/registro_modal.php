<div class="modal fade" id="registroEntrada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id=frmRegistro>
                    <div>
                        <select class="form-control" name="producto_id" id="producto_id" required placeholder="seleccione producto">
                            <option value="">seleccione producto</option>
                            <option value="1">Chompas</option>
                            <option value="2">Pantalones</option>
                            <option value="3">Poleras</option>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cantidad:</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad" maxlength ="3" required placeholder="cantidad">
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