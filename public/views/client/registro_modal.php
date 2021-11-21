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
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="nombre" maxlength ="15" required placeholder="Escribe tu nombre aqui">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" maxlength ="30" required placeholder="Escribe tu apellido aqui">
                </div>
                <div class="form-group">
                    <label for="ci">CI</label>
                    <input type="text" class="form-control" id="ci" name="ci" required placeholder="ci">
                </div>

            <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="telefono">
                </div>
                 <div class="form-group col-md-6">
                     <label for="inputState">Correo</label>
                     <input type="email" class="form-control" id="correo" name="correo" required placeholder="escribe tu email" >
                </div>
              
                </div>

                <div class="form-group">
                    <label for="message-text" class="col-form-label">Direccion:</label>
                    <textarea class="form-control" id="direccion"></textarea >
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