<?php
if ($_POST) {
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    require '../../CLASS/VO/ClienteVO.php';

    $ClienteDAO = new ClienteDAO();
    $data = $ClienteDAO->listaCliente2();
    $modi = false;
    $elim = true;
    ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Cédula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Dirección</th>
                <?php if ($modi == true) { ?>
                    <th scope="col">Modificar</th>
                <?php } ?>
                <?php if ($elim == true) { ?>
                    <th scope="col">Eliminar</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < sizeof($data); $i++) {
                $tmp = $data[$i];
                $ClienteVO = new ClienteVO();
                $ClienteVO->setId($tmp["cod"]);
                $ClienteVO->setNombre($tmp["nom"]);
                $ClienteVO->setCorreo($tmp["email"]);
                $ClienteVO->setCc($tmp["cedula"]);
                $ClienteVO->setTele($tmp["te"]);
                $ClienteVO->setDireccion($tmp["dir"]);
                ?>
                <tr>
                    <th><?= $ClienteVO->getId() ?></th>
                    <th><?= $ClienteVO->getCc() ?></th>
                    <td><?= $ClienteVO->getNombre() ?></td>
                    <td><?= $ClienteVO->getCorreo() ?></td>
                    <td><?= $ClienteVO->getTele() ?></td>
                    <td><?= $ClienteVO->getDireccion() ?></td>
                    <?php if ($modi == true) { ?>
                        <td>Modificar</td>
                    <?php } ?>
                    <?php if ($elim == true) { ?>
                        <td><button type="button" class="btn btn-danger btn-sm eliCli" cod="<?php echo $ClienteVO->getId(); ?>">Danger</button></td></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
    <?php if ($elim == true) { ?>
            var cualCliente;
                $(".eliCli").click(function () {
                    cualCliente = $(this);
                    var parametro = "cod=" + $(this).attr("cod");
                    var collBack = function () {
                        var url = "DeleteCliente";
                        var ejecutar = function (datos) {
                            datos = JSON.parse(datos);
                            if (datos.success == true) {
                                alertaOK("Resultado:", "El cliente fue <b>Eliminado</b>");
                                // $("#lisClie").trigger("click");
                                //  fAjax("ListaCliente", "a=1", function (datos) {$("#contenido").html(datos);});
                                cualCliente.parent().parent().fadeOut( 1000, function() {
                                    $(this).remove();
                                    cerrarDialog();
                                });
                                cualCliente= null;
                            } else {
                                alertaError("Error de proceso", "No se elimino el <b>cliente</b>")
                            }
                        };
                        fAjax(url, parametro, ejecutar);
                    };
                    var titulo = "Solicitud";
                    var Mensaje = "Esta seguro de Eliminar el Cliente";
                    alertaSoli(titulo, Mensaje, collBack);
                });
    <?php } ?>
        });
    </script>



    <?php
} else {
    header("location:./");
}
