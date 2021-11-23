<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Entradas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmEditar">
                    <input type="hidden" name="id_entrada" id="id_entrada" value="">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Producto:</label>
                        <select class="form-control" name="producto_edit" id="producto_edit" required placeholder="seleccione producto">
                            <option value="">seleccione producto</option>
                            <?php foreach ($productos as $producto) : ?>
                                <option value="<?php echo $producto['Id_Articulo'] ?>"><?php echo $producto['Nombre_Art'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cantidad:</label>
                        <input type="text" class="form-control" id="cantidad_edit" name="cantidad_edit" maxlength="3" required placeholder="cantidad">
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