<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrdenDAO
 *
 * @author asus21
 */
class OrdenDAO {

    //put your code here

    function addOrden($arreglo) {
        date_default_timezone_set('America/Los_Angeles');
        $OrdenVO = new OrdenVO();
        $OrdenVO->setId(null);
        $OrdenVO->setCorreo($arreglo["correo"]);
        $OrdenVO->setDireccion($arreglo["dir"]);
        $OrdenVO->setEstado(0);
        $OrdenVO->setFecha(null);
        $OrdenVO->setFk_cliente($_SESSION["IdCliente"]);
        $OrdenVO->setTele($arreglo["tele"]);
        $OrdenVO->setToken(sha1(date("YMDWHiseOPT")));


        $sql = "insert into orden (fk_cliente,direccion,tele,correo,token) values(?,?,?,?,?);";
        $bd = new MySQL();
        $comm = $bd->getMysqli();
        $stmp = $comm->prepare($sql);
        $fk = $OrdenVO->getFk_cliente();
        $dir = $OrdenVO->getDireccion();
        $cor = $OrdenVO->getCorreo();
        $te = $OrdenVO->getTele();
        $token = $OrdenVO->getToken();
        $stmp->bind_param("issss", $fk, $dir, $cor, $te, $token);
        $resultado = array();
        $resultado["success"] = false;
        if ($stmp->execute()) {
            $sql = "select id from orden where token like '" . $OrdenVO->getToken() . "';";
            $data = $bd->query($sql);
            $resultado["success"] = true;
            $_SESSION["idFactura"] = $data[0]["id"];
            $resultado["orden"] = $data[0]["id"];
        }
        echo json_encode($resultado);
        $stmp->close();
    }

}
