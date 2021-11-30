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
                <form id="frmEditar" method="post" enctype="multipart/form-data" action="../../models/product/editar_model.php">
                    <input type="hidden" name="id_producto" id="id_producto" value="">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
                        <input type="text" class="form-control" id="nombre_edit" name="nombre_edit" required placeholder="Escribe aqui">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Imagen del producto:</label>
                        <input type="file" id="imagen_edit" name="imagen_edit">
                    </div>
                    <div class="form-group">
                        <label for="categoria_edit">Categoria</label>
                        <select class="form-control" name="categoria_edit" id="categoria_edit">
                            <option value="">Seleccione una categoria</option>
                            <?php foreach ($categorias as $categoria) : ?>
                                <option value="<?php echo $categoria['Id_Categoria'] ?>"><?php echo $categoria['Nombre'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="talla">Talla</label>
                            <select class="form-control" name="talla_edit" id="talla_edit">
                                <option value="">Seleccione la talla</option>
                                <option value="36">36</option>
                                <option value="38">38</option>
                                <option value="40">40</option>
                                <option value="42">42</option>
                                <option value="44">44</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="color">Color</label>
                            <select class="form-control" name="color_edit" id="color_edit">
                                <option value="">Seleccione color..</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Verde">Verde</option>
                                <option value="Azul">Azul</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Cian">Cian</option>
                                <option value="Magenta">Magenta</option>
                                <option value="Naranja">Naranja</option>
                                <option value="Verde limon">Verde limon</option>
                                <option value="Turquesa">Turquesa</option>
                                <option value="Azul claro">Azul claro</option>
                                <option value="Viloeta">Viloeta</option>
                                <option value="Rojo azulado">Rojo azulado</option>
                                <option value="Mostaza">Mostaza</option>
                                <option value="Palo Roza">Palo Roza</option>
                                <option value="Plomo">Plomo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                        <textarea class="form-control" id="descripcion_edit" name="descripcion_edit" placeholder="Descripción"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio" class="col-form-label">Precio:</label>
                        <input type="text" class="form-control" id="precio_edit" name="precio_edit" maxlength="4" required placeholder="precio">
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