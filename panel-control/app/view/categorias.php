<script type="text/javascript" src="<?php echo JS; ?>custom/categorias.js"></script>

<h2 class="sub-header">Categorias</h2>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" role="form" id="form_global" data-toggle="validator">
            <div class="form-group has-feedback">
                <label for="id_nombre" class="col-lg-2 control-label">Nombre:</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="id_nombre" placeholder="Nombre" required autocomplete="off" name="nombre">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="id_nombre_descripcion" class="col-lg-2 control-label">Nombre Descripcion:</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="id_nombre_descripcion" placeholder="Nombre descripcion" required autocomplete="off" name="nombre_descripcion">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="id_descripcion" class="col-lg-2 control-label">Descripcion:</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="5" id="id_descripcion" name="descripcion" required style="resize: none;" autocomplete="off"></textarea>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="id_imagen" class="col-lg-2 control-label">Imagenes:</label>
                <div class="col-lg-10">
                    <input id="id_imagen" name="imagenes[]" multiple type="file" class="file-loading" accept="image/*">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>

            <div class="form-group" style="text-align: right;">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary" id="id_submit">Aceptar</button>
                    <button type="button" class="btn btn-primary" id="reset_button">Limpiar</button>
                </div>
            </div>
            <input type="hidden" id="submit_type" value="categorias/add" />
            <input type="hidden" id="upload_images" value="1" />
            <input type="hidden" id="submit_id" />
            <input type="hidden" id="key_nombre" name="key_nombre" value="1"/>
        </form>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
</div>