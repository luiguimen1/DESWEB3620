/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
<?php
$lista = false;
?>


$(document).ready(function () {
$(".inici").click(function () {
inicio($(this).attr("cod"));
});

function inicio(pValor) {
$("#contenido").html("Procesando.....");
var pag = Array("", "mision", "addFactura", "galeria", "ayuda", "planeta","ForCrArticulo","ListaCliente");
fAjax(pag[pValor], "a=1", function (datos) {
$("#contenido").html(datos);
});
}

<?php
if ($lista == true) {
    ?>
    $("#lisClie").click(function () {
    fAjax("ListaCliente", "a=1", function (datos) {
    $("#contenido").html(datos);
    });
    });
<?php } ?>


});

/**
* Metodo que permite traer el contenido de la pagian Lunes
* y ser modifcado el el archivo index
* @return {undefined}
*/



