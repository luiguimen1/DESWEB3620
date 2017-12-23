/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $("#forRegArticulo").validate({
        rules:{
           nombre:{
               required:true,
               maxlength:70
           },
           precio:{
               required:true,
               number:true
           },
           detalle:{
               required:true,
               rangelength:[5,255]
           }
        },
        messages:{
            
        },
        submitHandler:function(){
            var url = "addArticulo";
            var data = $("#forRegArticulo").
            var parametros = $("#forRegArticulo").serialize();
            var ejecutar=function(datos){
                datos = JSON.parse(datos);
                if(datos.success==true){
                    alert("Los datos fueron almacenados");
                     $("#forRegArticulo").LimpiarFor();
                }else{
                    alert("Los datos fueron NO almacenados");
                }
            };
            fAjax(url,parametros,ejecutar);
        }
    });
});


