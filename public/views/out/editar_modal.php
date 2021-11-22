<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Salida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form="frmEditar" method="post">
                    <div class="form-group">
                        <label for="clientes" class="col-form-label">Clientes:</label>
                        <select class="form-control" name="clientes_edit" id="clientes_edit">
                            <option value="">Seleccione cliente...</option>
                            <option value="1">Clara</option>
                            <option value="2">Rosa</option>
                            <option value="3">Esther</option>
                         </select>     
                     </div>
                       
                    <div class="form-group">
                        <label for="productos">Lista de productos</label>
                        <select class="form-control" name="productos_id_edit" id="productos_id_edit">
                            <option value="">Seleccione productos...</option>
                            <option value="1">Chompas</option>
                            <option value="2">Pantalones</option>
                            <option value="3">Poleras</option>
                        </select>                    
                    </div>
                    <div class="form-group">
                        <label for="cantidad" class="col-form-label">Cantidad:</label>
                        <input type="text" class="form-control" id="cantidad_edit" name="cantidad_edit" maxlength ="3" required placeholder="cantidad">
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