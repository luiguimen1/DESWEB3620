/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Metodo que permite Ejecutar peticiones ajax
 * @param {type} url
 * @param {type} parametros
 * @param {type} ejecutar
 * @return {undefined}
 */
function fAjax(url, parametros, ejecutar) {
    $.ajax({
        type: "POST",
        url: url,
        dataType: 'html',
        data: parametros,
        cache: false,
        beforeSend: function () {

        }, error: function () {
            alert("Hay un error de comexion con el servidor");
        },
        complete: function () {

        },
        success: function (data) {
            ejecutar(data);
        }
    });
}



jQuery.fn.LimpiarFor = function () {
    $(this).each(function () {
        this.reset();
    });
};

jQuery.validator.addMethod("EsTextoMinu", function (value, element) {
    return this.optional(element) || /^[a-z ]+$/i.test(value);
}, function (element) {
    return "Solo letras en Miniscula";
});

jQuery.validator.addMethod("EsTextoMayus", function (value, element) {
    return this.optional(element) || /^[A-Z ]+$/i.test(value);
}, function (element) {
    return "Solo letras en Miniscula";
});
jQuery.validator.addMethod("EsTexto", function (value, element) {
    return this.optional(element) || /^[A-Z a-z]+$/i.test(value);
}, function (element) {
    return "Solo de ser texto a-Z";
});

jQuery.validator.addMethod("numero15", function (value, element) {
    return this.optional(element) || /^[1-5]+$/i.test(value);
}, function (element) {
    return "Solo de ser numero del 1-5";
});

jQuery.validator.addMethod("correo", function (value, element) {
    // allow any non-whitespace characters as the host part
    return this.optional(element) || /^[a-z0-9]+@([a-z0-9])+([?.])+[a-z0-9]+$/.test(value);
}, 'Please enter a valid email address.');


function alerta(pvTitulo, pvMensaje) {
    $("#dialog").attr("title", pvTitulo);
    $("#dialog").html(pvMensaje);
    $("#dialog").dialog({
        close: function (event, ui) {
            $(this).dialog("destroy");
        }
    });
}

function alertaError(pvTitulo, pvMensaje) {
    var mensaje = '<div class="alert alert-dismissible alert-danger">' + pvMensaje + '</div>';
    alerta(pvTitulo, mensaje);
}

function alertaOK(pvTitulo, pvMensaje) {
    var mensaje = '<div class="alert alert-dismissible alert-success">' + pvMensaje + '</div>';
    alerta(pvTitulo, mensaje);
}

function alertaInfo(pvTitulo, pvMensaje) {
    var mensaje = '<div class="alert alert-dismissible alert-info">' + pvMensaje + '</div>';
    alerta(pvTitulo, mensaje);
}

/**
 * 
 * @param {type} pvTitulo
 * @param {type} mensaje
 * @param {type} ejecutar Metodo callback
 * @return {undefined}
 */
function alertaSoli(pvTitulo, mensaje, ejecutar) {
    $("#dialog-confirm").attr("title",pvTitulo);
    $("#dialog-confirm #msnConf").html(mensaje);
    $("#dialog-confirm").dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            Aceptar: function () {
                ejecutar();
                $(this).dialog("close");
            },
            Cancel: function () {
                $(this).dialog("close");
            }
        },
        close: function( event, ui ) {
            $(this).dialog( "destroy" );
        }
    });
}

function cerrarDialog(){
    $(".ui-dialog-titlebar-close").trigger("click");
}
var bCerrar='<button type="button" onclick="cerrarDialog()" class="btn btn-success">Cerrar</button>';