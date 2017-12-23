<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleDAO
 *
 * @author asus21
 */
class DetalleDAO {

    //put your code here
    public function crearDetalle($array) {
        $DetalleVO = new DetalleVO();
        $limite = $array["numItem"];
        $respuesta = array();
        $respuesta["success"] = false;
        for ($i = 1; $i < $limite; $i++) {
            if (isset($array["item" . $i])) {
                $DetalleVO->setFk_orden($array["idFac"]);
                $ArrayPro = explode("-", $array["item" . $i]);
                $DetalleVO->setFk_articulo($ArrayPro[2]);
                $DetalleVO->setCant($array["can" . $i]);
                $sql = "insert into detalles (cant, precio , fk_orden, fk_articulo) value (?,(select precio from articulo where id = ?),?,?);";
                $bd = new MySQL();
                $comm = $bd->getMysqli();
                $stmp = $comm->prepare($sql);
                $can = $DetalleVO->getCant();
                $precio = $DetalleVO->getFk_articulo();
                $orden = $DetalleVO->getFk_orden();
                $art = $DetalleVO->getFk_articulo();
                $stmp->bind_param("iiii", $can, $precio, $orden, $art);
                $stmp->execute();
                $respuesta["success"] =true;
            }
        }
        echo json_encode($respuesta);
    }

}
