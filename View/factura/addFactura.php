<?php

if ($_POST) {
    ?>
    <script src="JS/opFactura.js" type="text/javascript"></script>
    <h2>Crear factura</h2>
    <fieldset>
        <legend>Opcion inicial</legend>
        <form id="forBusCliente" name="forBusCliente">
            <div class="form-group row">
                <label for="cc" class="col-sm-3 col-form-label">Ingrese la Cedula del cliente</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control col-12" id="cc" name="cc" placeholder="Ingrese la cédula">
                    <button type="submit" class="form-control btn btn-info btn-sm col-2">Buscar</button>
                </div>
            </div>
        </form>
        <div style="display: none;" id="caja">
            <form id="ForAddFactura" name="ForAddFactura">
                <div class="form-group col-6">
                    <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" readonly="readonly" class="form-control-plaintext" id="nombre" name="nombre">
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="dir" class="col-sm-3 col-form-label">Direccion de entre</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="dir" name="dir" value="Ingrese la dirección">
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="tele" class="col-sm-3 col-form-label">Telefono</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tele" name="tele" value="Ingrese el telefono">
                    </div>
                </div>
                <div class="form-group col-6">
                    <label for="correo" class="col-sm-3 col-form-label">Correo</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="correo" name="correo" value="Ingrese el Correo">
                    </div>
                </div>
                <button type="submit" class="form-control btn btn-info btn-sm col-2">Crear</button>
                <button type="reset" id="cancelarFac" class="form-control btn btn-danger btn-sm col-2">Cancelar</button>
            </form>
        </div>
        <div style="display: none;" id="caja2">
            <div class="col-12">
                <form id="forRefDet" name="forRefDet">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Proyecto</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Quitar</th>
                            </tr>
                        </thead>
                        <tbody id="variosItem">

                        </tbody>
                    </table>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Valor Total</th>
                                <th scope="col" id="totalValor">***********</th>
                                <th scope="col">Agregar Producto</th>
                                <th scope="col"><button type="button" id="agregarItem" class="btn btn-info btn-sm">Agregar campo</button> </th>
                                <th scope="col">Finalizar compra</th>
                                <th scope="col" id="totalValor"><button type="submit" class="btn btn-success btn-sm">Cerrar Compra</button></th>
                            </tr>
                        </thead>
                    </table>
                </form>
            </div>
        </div>
        <div style="display: none;" id="caja3">
            <table>
                <tbody id="guiaItem">
                    <tr>
                        <td>
                            <input type="text" class="form-control itemSele" aria-describedby="Producto" required placeholder="Ingrese nombre producto">
                        </td>
                        <td id="codigo">********</td>
                        <td id="precio">********</td>
                        <td><input type="number" class="form-control can" aria-describedby="elprecio" placeholder="cantidad" required></td>
                        <td class="valorTotal" id="valor">********</td>
                        <td><button type="button" class="btn btn-danger btn-sm quitar">Quitar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </fieldset>

    <?php

} else {
    header("location:.././");
}