<?php

if ($_POST) {
    ?>
    <script src="JS/valiArticulo.js" type="text/javascript"></script>
    <form id="forRegArticulo" name="forRegArticulo">
        <h2>Crear articulos</h2>
        <fieldset>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre Articulo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="" placeholder="Nombre del articulo">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="precio" name="precio" value="" placeholder="Ingrese el precio">
                    </div>
                </div>
            </div>
            <div class="col-lg-12" style="float: left;">
                <div class="form-group row">
                    <label for="detalle" class="col-sm-2 col-form-label">Detalles</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="detalle" name="detalle" placeholder="Ingrese un comentario"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-12" style="float: left;">
                <center>
                    <button type="submit" class="btn btn-primary">Almacenar</button>
                    <button type="reset" class="btn btn-primary">Cancelar</button>
                </center>
            </div>
        </fieldset>

    </form>


    <?php

} else {
    header("location:./");
}