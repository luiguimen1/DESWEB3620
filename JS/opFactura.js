/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global bCerrar */

$(document).ready(function () {
    function buscarCliente() {
        $("#forBusCliente").validate({
            rules: {
                cc: {
                    required: true,
                    number: true,
                    digits: true,
                    maxlength: 12
                }
            },
            submitHandler: function () {
                var url = "ClienteCC";
                var parametro = "cc=" + $("#cc").val();
                var ejecutar = function (datos) {
                    if (datos != 0) {
                        datos = $.parseJSON(datos);
                        datos = datos[0];
                        $("#caja").fadeIn("show");
                        $("#nombre").val(datos.nombre);
                        $("#dir").val(datos.direccion);
                        $("#correo").val(datos.correo);
                        $("#tele").val(datos.tele);
                        cancelarFactura();
                        crearOrden();
                        $("#forBusCliente").fadeOut();
                    } else {
                        alertaError("Busqueda:", "El cliente con la cédula <b>" + $("#cc").val() + "</b> no se encontro");
                    }
                };
                fAjax(url, parametro, ejecutar);
            }
        });
    }
    buscarCliente();

    function cancelarFactura() {
        $("#cancelarFac").unbind("click");
        $("#cancelarFac").click(function () {
            $("#caja").fadeOut("normal");
            $("#ForAddFactura").LimpiarFor();
            $("#cc").val("");
            $("#forBusCliente").fadeIn();
            ForAddFactura.destroy();
        });
    }
    var NumItemCon = 1;
    var ForAddFactura = null;
    function crearOrden() {
        //validator.destroy();
        ForAddFactura = $("#ForAddFactura").validate({
            rules: {
                dir: {
                    required: true
                }
            },
            submitHandler: function () {
                var url = "addOrden";
                var parametros = $("#ForAddFactura").serialize();
                var ejecutar = function (datos) {
                    datos = JSON.parse(datos);
                    if (datos.success == true) {
                        alertaOK("Comunicado:", "LA factura ha sido creada con el codigo <b>" + datos.orden + "</b>" + bCerrar);
                        setTimeout(function () {
                            cerrarDialog();
                        }, 1000);
                        $("#caja2").fadeIn();
                        $("#ForAddFactura button").fadeOut();
                        $("#agregarItem").click(function () {
                            var dato = $("#guiaItem").html();
                            $("#variosItem").append(dato);
                            var hijo = $("#variosItem tr").last();
                            $(hijo).find(".can").prop("id", "can" + NumItemCon);
                            $(hijo).find(".can").prop("name", "can" + NumItemCon);
                            $(hijo).find(".itemSele").prop("id", "item" + NumItemCon);
                            $(hijo).find(".itemSele").prop("name", "item" + NumItemCon);
                            NumItemCon++;
                            $("#variosItem .quitar").unbind("click");
                            $("#variosItem .quitar").click(function () {
                                $(this).parent().parent().remove();
                                valorTotal();
                            });
                            paraCompletar();
                            calValor();
                            registarFactura();
                        });
                        $("#agregarItem").trigger("click");
                    } else {
                        alertaError("Comunicado de error", "La factura no fue creada, intente de nuevo.<br>Si el <b>error</b> persiste comunique con el administrador." + bCerrar);
                    }
                };
                fAjax(url, parametros, ejecutar);
            }
        });
    }

    function valorTotal() {
        var valorT = 0;
        $('#variosItem .valorTotal').each(function (key, element) {
            var local = $(this).html() != "********" ? $(this).html() : 0;
            valorT += parseFloat(local);
        });
        $("#totalValor").html(valorT);
    }

    function calValor() {
        $("#variosItem .can").unbind("keyup");
        $("#variosItem .can").keyup(function (event) {
            var precio = $(this).parent().parent().children("#precio").html();
            var valor = precio * $(this).val();
            $(this).parent().parent().children("#valor").html(valor);
            valorTotal();
        });
    }

    function paraCompletar() {
        $("#variosItem .itemSele").keyup(function (e) {
            if (e.which != 13) {
                $(this).parent().parent().children("#precio").html("********");
                $(this).parent().parent().children("#codigo").html("********");
                $(this).parent().parent().find(".can").val("");
                $(this).parent().parent().children("#valor").html("********");
                valorTotal();
            }
        });
        $("#variosItem .itemSele").autocomplete({
            /*
             open: function () {
             $(this).parent().parent().children("#precio").html("********");
             $(this).parent().parent().children("#codigo").html("********");
             $(this).parent().parent().find("#can").val("");
             $(this).parent().parent().children("#valor").html("********");
             },*/
            source: function (request, response) {
                $.ajax({
                    type: "POST",
                    url: "buscarArticulo",
                    data: request,
                    success: response,
                    dataType: 'json'
                });
            },
            minLength: 2,
            select: function (event, ui) {
                var data = ui.item;
                data = data.value.split("-");
                $(this).parent().parent().children("#precio").html(data[1]);
                $(this).parent().parent().children("#codigo").html(data[2]);
                $(this).parent().parent().find(".can").val("");
                $(this).parent().parent().children("#valor").html("********");
                valorTotal();
            }
        });
    }



    function registarFactura() {
        $("#forRefDet").validate({
            submitHandler: function () {

                var titulo = "Confime:";
                var mensaje = "Cierre de Factura<br>En caso de reapertura debe comunicarse con su superior";
                var ejecutar = function () {
                    var url = "RegDetalles";
                    var parametros = $("#forRefDet").serialize() + "&numItem=" + NumItemCon;
                    var ejecutar = function (datos) {
                        alert(datos);
                        var datos = JSON.parse(datos);
                        if (datos.success == true) {
                            alertaOK("Comunicado:", "LA factura fue Cerrada");
                            $("#variosItem").children().remove("tr");
                            $("#caja2").fadeOut();
                            $("#caja").fadeOut();
                            $("#ForAddFactura button").fadeIn();
                            $("#forBusCliente").delay(500).fadeIn();
                            $("#totalValor").html("*******");
                            NumItemCon = 1;
                        } else {
                            alertaError("Comunicado Error:", "La factura no fue cerrada");
                        }
                    };
                    fAjax(url, parametros, ejecutar);
                };
                alertaSoli(titulo, mensaje, ejecutar);
            }
        });
    }
});

