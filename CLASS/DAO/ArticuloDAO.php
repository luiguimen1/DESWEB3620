<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticuloDAO
 *
 * @author asus21
 */
class ArticuloDAO {
    //put your code here
    
    function Almacenar($arreglo){
        $ArticuloVO = new ArticuloVO();
        $ArticuloVO->setNombre($arreglo["nombre"]);
        $ArticuloVO->setPrecio($arreglo["precio"]);
        $ArticuloVO->setdetalle($arreglo["detalle"]);
        $ArticuloVO->setId("null");
        $sql = "insert into articulo (nombre, precio, detalles) values(?,?,?);";
        $bd= new MySQL();
        $comm = $bd->getMysqli();
        $stmp = $comm->prepare($sql);
        $nom = $ArticuloVO->getNombre();
        $precio = $ArticuloVO->getPrecio();
        $detalle = $ArticuloVO->getDetalle();
        
        $stmp->bind_param("sds",$nom,$precio,$detalle);
        
        $respuesta = array();
        $respuesta["success"]=false;
        
        if($stmp->execute()==1){
            $respuesta["success"]=true;
        }
        
        echo json_encode($respuesta);
        $stmp->close();
        $comm->close();        
    }
    
    
    function buscarXNombre($array){
        $ArticuloVO = new ArticuloVO();
        $ArticuloVO->setNombre($array["term"]);
        $sql = 'select concat(nombre,"-",precio,"-",id) as data from articulo where nombre like "%'.$ArticuloVO->getNombre().'%";';
        $bd = new MySQL();
        return $bd->query($sql);
    }
}
