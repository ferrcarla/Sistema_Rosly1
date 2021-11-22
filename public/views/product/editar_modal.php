<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Editar Productos</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="frmEditar">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
                    <input type="text" class="form-control" id="name_id_edit" name="nombre_id_edit" maxlength ="15" required placeholder="Escribe aqui">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Imagen del producto:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/png, image/jpeg">
                </div>
                <div class="form-group">
                    <label for="ci">Categoria</label>
                    <select class="form-control" name="categorias_id_edit" id="categoria_id_edit">
                        <option value="0"></option>
                        <option value="1">Chompas</option>
                        <option value="2">Pantalones</option>
                        <option value="3">Poleras</option>
                    </select>                    
                </div>

            <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="talla">Talla</label>
                    <select class="form-control" name="tallas" id="talla">
                        <option value="0"></option>
                        <option value="1">S</option>
                        <option value="2">M</option>
                        <option value="3">L</option>
                    </select>                    
                   
                </div>
                 <div class="form-group col-md-6">
                     <label for="inputState">Color</label>
                     <select class="form-control" name="color_id_edit" id="color_id_edit">
                        <option value="0"></option>
                        <option value="1">Azul</option>
                        <option value="2">Morado</option>
                        <option value="3">Blanco</option>
                    </select>                    
                </div>
              
                </div>

                <div class="form-group">
                    <label for="message-text" class="col-form-label">Descripcion:</label>
                    <textarea class="form-control" id="descripcion"></textarea >
            </div>
            <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Precio:</label>
                    <input type="text" class="form-control" id="precio" name="precio" maxlength ="4" required placeholder>
                </div>
                <div class="float-right">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnEditar">Editar</button>
                </div>
             </form>
      </div>      
    </div>
  </div>
</div>