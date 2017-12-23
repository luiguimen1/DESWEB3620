<?php
if ($_POST) {
    session_start();
    require '../../CLASS/VO/ClienteVO.php';
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    $ClienteVO = new ClienteVO();
    $ctrl = false;
    if (isset($_POST["cod"])) {
        $ctrl = true;
        $ClienteDAO = new ClienteDAO();
        $data = $ClienteDAO->clienteXId($_POST);
        if (is_array($data)) {
            session_name("clienteUp");
            $data = $data[0];
            $ClienteVO->setCc($data["cc"]);
            $ClienteVO->setCorreo($data["correo"]);
            $ClienteVO->setDireccion($data["direccion"]);
            $ClienteVO->setId($data["id"]);
            $ClienteVO->setTele($data["tele"]);
            $ClienteVO->setNombre($data["nombre"]);
            $_SESSION["clienteUp"]= serialize($ClienteVO);            
        }
    }

    if ($ctrl == false) {
        $titulo = "Agregar Cliente";
        $legend = "Formulario de Agregar un Cliente";
        $boton = "Agregar";
    } else {
        $titulo = "Modificar Cliente";
        $legend = "Formulario para modificar un Cliente";
        $boton = "Modificar";
    }
    ?>
    <script src="JS/valiCliente.js" type="text/javascript"></script>
    <h2><?= $titulo; ?></h2>
    <form id="formRegCli" name="formRegCli">
        <fieldset>
            <legend><?= $legend; ?></legend>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="cc" class="col-sm-2 col-form-label">CC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cc" name="cc" value="<?php echo $ClienteVO->getCc(); ?>" placeholder="Ingrese su cédula">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $ClienteVO->getNombre(); ?>" placeholder="Ingrese el Nombre">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="tele" class="col-sm-2 col-form-label">Tele</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tele" name="tele" value="<?php echo $ClienteVO->getTele(); ?>" placeholder="Ingrese el telefono">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $ClienteVO->getCorreo(); ?>" placeholder="Ingrese su correo">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="correo1" class="col-sm-2 col-form-label">Confirme Correo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="correo1" name="correo1" value="<?php echo $ClienteVO->getCorreo(); ?>" placeholder="Confirme su correo">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="direc" class="col-sm-2 col-form-label">dirección</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="direc" name="direc" value="<?php echo $ClienteVO->getDireccion(); ?>" placeholder="Ingrese su dirección">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="float: left;">
                <div class="form-group row">
                    <label for="fechan" class="col-sm-2 col-form-label">Fecha na</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fechan" name="fechan" value="" placeholder="Ingrese su dirección">
                    </div>
                </div>
            </div>
            <div class="col-lg-12" style="float: left;">
                <center>
                    <button type="submit" class="btn btn-primary"><?=$boton;?></button>
                    <button type="reset" class="btn btn-primary">Cancelar</button>
                </center>
            </div>
        </fieldset>
    </form>
    <script>
    $(document).ready(function(){
        $("#fechan").datepicker();
        $("#fechan").datepicker( "option", "dateFormat", "yy/mm/dd" );
    });
    </script>
    
    <?php
} else {
    header("location:.././");
}