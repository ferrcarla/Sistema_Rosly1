<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registro de Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmRegistro" method="post" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
                        <input type="text" class="form-control" id="name" name="nombre" maxlength="15" required placeholder="Escribe aqui">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Imagen del producto:</label>
                        <input type="file" id="imagen" name="imagen" >
                    </div>
                    <div class="form-group">
                        <label for="ci">Categoria</label>
                        <select class="form-control" name="categoria" id="categoria">
                            <option value="">Seleccione una categoria</option>
                            <?php foreach ($categorias as $categoria) : ?>
                                <option value="<?php echo $categoria['Id_Categoria'] ?>"><?php echo $categoria['Nombre'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="talla">Talla</label>
                            <select class="form-control" name="talla" id="talla">
                                <option value="0"></option>
                                <option value="1">S</option>
                                <option value="2">M</option>
                                <option value="3">L</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="color">Color</label>
                            <select class="form-control" name="color" id="color">
                                <option value=""></option>
                                <option value="1">Azul</option>
                                <option value="2">Morado</option>
                                <option value="3">Blanco</option>
                            </select>
                        </div>
                    </div>                       
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio" class="col-form-label">Precio:</label>
                        <input type="text" class="form-control" id="precio" name="precio" maxlength="4" required placeholder="precio">
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