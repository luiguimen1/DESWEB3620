/**
 * 
 * @type {type}
 */
$(document).ready(function(){
    $("#formRegCli").validate({
        rules:{
           cc:{
               required:true,
               number:true,
               digits:true
           },
           nombre:{
               required:true
           },
           correo:{
               required:true,
               correo:true
           },
           correo1:{
               equalTo:"#correo"
           },
           direc:{
               required:true,
               maxlength:70
           }
        },
        messages:{
            cc:{
                digits:"La cédula no puede tener puntos ni comas"
            }
        },
        submitHandler:function(){
            var url = "addCliente";
            var parametros = $("#formRegCli").serialize();
            var ejecutar=function(datos){
                alert(datos);
                datos = JSON.parse(datos);
                if(datos.success==true){
                    alert("Los datos fueron almacenados");
                     $("#formRegCli").LimpiarFor();
                }else{
                    alert("Los datos fueron NO almacenados");
                }
            };
            fAjax(url,parametros,ejecutar);
        }
    });
});


