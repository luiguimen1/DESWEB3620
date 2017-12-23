/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    function martes(){
        inicio(2);
    }
    
    function inicio(pValor) {
       $(".item3 li").click(function(){
           alert("Hola");
       });
    }
    martes();
});
