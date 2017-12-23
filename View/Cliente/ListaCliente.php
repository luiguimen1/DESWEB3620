<?php
if ($_POST) {
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    require '../../CLASS/VO/ClienteVO.php';
    $modi = true;
    $elim = false;
    $ClienteDAO = new ClienteDAO();
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
                <?php
                if ($modi == true) {
                    ?>
                    <th scope="col">Modificar</th>
                    <?php
                }
                ?>
                <?php
                if ($elim == true) {
                    ?>
                    <th scope="col">Eliminar</th>
                    <?php
                }
                ?>
            </tr>
        </thead>
        <tbody id="listaCliente">

        </tbody>
    </table>
    <script>
        $(document).ready(function () {
            var lista = <?= $ClienteDAO->listaCliente() ?>;
            function cargar() {
                var limite = lista.length;
                for (var i = 0; i < limite; i++) {
                    var tmp = lista[i];
                    var estu = $("<tr>");
                    estu.append("<td>" + tmp.cod + "</td>");
                    estu.append("<td>" + tmp.cedula + "</td>");
                    estu.append("<td>" + tmp.nom + "</td>");
                    estu.append("<td>" + tmp.email + "</td>");
                    estu.append("<td>" + tmp.te + "</td>");
                    estu.append("<td>" + tmp.dir + "</td>");
    <?php if ($modi == true) { ?>
                        estu.append('<td><button type="button" class="btn btn-info btn-sm modicli" cod="' + tmp.cod + '">Modificar</button></td>');
    <?php } ?>
    <?php if ($elim == true) { ?>
                        estu.append('<td><button type="button" class="btn btn-danger btn-sm eliCli" cod="' + tmp.cod + '">Eliminar</button></td>');
    <?php } ?>
                    $("#listaCliente").append(estu);
                }
            }
            cargar();
    <?php if ($elim == true) { ?>
                var cualCliente = null;
                function eliminarCliente() {
                    $(".eliCli").click(function () {
                        var parametro = "cod=" + $(this).attr("cod");
                        var collBack = function () {
                            var url = "DeleteCliente";
                            var ejecutar = function (datos) {

                                datos = JSON.parse(datos);
                                if (datos.success == true) {
                                    alertaOK("Resultado:", "El cliente fue <b>Eliminado</b>");
                                    // $("#lisClie").trigger("click");
                                    //  fAjax("ListaCliente", "a=1", function (datos) {$("#contenido").html(datos);});
                                    cualCliente.parent().parent().fadeOut(1000, function () {
                                        $(this).remove();
                                        cerrarDialog();
                                    });
                                    cualCliente = null;
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
                }
                eliminarCliente();
    <?php } ?>


    <?php if ($modi == true) { ?>
                $(".modicli").click(function () {
                    var url = "mision";
                    var parametro = "cod=" + $(this).attr("cod");
                    var ejecutar = function (datos) {
                        $("#contenido").html(datos);
                    };
                    fAjax(url, parametro, ejecutar);
                });
    <?php } ?>

        });
    </script>


    <?php
} else {
    header("location:./");
}
