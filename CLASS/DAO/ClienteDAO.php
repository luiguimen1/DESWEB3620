<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteDAO
 *
 * @author asus21
 */
class ClienteDAO {

    //put your code here
    function agregar($arreglo) {
        $ClienteVO = new ClienteVO();
        $ClienteVO->setCc($arreglo["cc"]);
        $ClienteVO->setNombre($arreglo["nombre"]);
        $ClienteVO->setTele($arreglo["tele"]);
        $ClienteVO->setCorreo($arreglo["correo"]);
        $ClienteVO->setDireccion($arreglo["direc"]);
        $ClienteVO->setId(null);

        //  $sql="insert into cliente values(null,'".$_POST["CC"]."','".$ClienteVO->getNombre()."','".$ClienteVO->getCorreo()."','".$ClienteVO->getTele()."');";
        $bd = new MySQL();
        $sql = "insert into cliente (cc,nombre,correo,tele,direccion) values(?,?,?,?,?);";
        $comm = $bd->getMysqli();
        $stmp = $comm->prepare($sql);
        $cc = $ClienteVO->getCc();
        $nom = $ClienteVO->getNombre();
        $cor = $ClienteVO->getCorreo();
        $te = $ClienteVO->getTele();
        $dir = $ClienteVO->getDireccion();
        $stmp->bind_param("sssss", $cc, $nom, $cor, $te, $dir);
        $respuesta = array();
        $respuesta["success"] = false;
        if ($stmp->execute() == 1) {
            $respuesta["success"] = true;
        }
        echo json_encode($respuesta);
        $stmp->close();
        $comm->close();
    }

    function listaCliente() {
        $sql = "select id cod, cc cedula, nombre nom, correo email, tele te, direccion dir from cliente order by nom;";
        $bd = new MySQL();
        $data = $bd->query($sql);
        echo json_encode($data);
    }

    function listaCliente2() {
        $sql = "select id cod, cc cedula, nombre nom, correo email, tele te, direccion dir from cliente order by nom;";
        $bd = new MySQL();
        $data = $bd->query($sql);
        return $data;
    }

    function deleteCliente($arreglo) {
        $ClienteVO = new ClienteVO();
        $ClienteVO->setId($arreglo["cod"]);
        $bd = new MySQL();
        $comm = $bd->getMysqli();
        $stmp = $comm->prepare("delete from cliente where id = ?;");
        $cod = $ClienteVO->getId();
        $stmp->bind_param("i", $cod);
        $repuesta = array();
        $repuesta["success"] = false;
        if ($stmp->execute()) {
            $repuesta["success"] = true;
        }
        echo json_encode($repuesta);
        $stmp->close();
        $comm->close();
    }

    function clienteXId($arreglo) {
        $ClienteVO = new ClienteVO();
        $ClienteVO->setId($arreglo["cod"]);

        $sql = "select * from cliente where id=" . $ClienteVO->getId() . ";";
        $bd = new MySQL();
        $data = $bd->query($sql);
        return $data;
    }

    function clienteXCC($arreglo) {
        $ClienteVO = new ClienteVO();
        $ClienteVO->setCc($arreglo["cc"]);

        $sql = "select * from cliente where cc like '" . $ClienteVO->getCc() . "';";
        $bd = new MySQL();
        $data = $bd->query($sql);
        if($data!=0){
            $_SESSION["IdCliente"]=$data[0]["id"];
        }
        echo json_encode($data);
    }

    function clienteUpdate($arreglo) {
        $ClienteVO = new ClienteVO();
        $ClienteVO->setCc($arreglo["cc"]);
        $ClienteVO->setNombre($arreglo["nombre"]);
        $ClienteVO->setTele($arreglo["tele"]);
        $ClienteVO->setCorreo($arreglo["correo"]);
        $ClienteVO->setDireccion($arreglo["direc"]);
        $ClienteVO->setId($arreglo["cod"]);
        $sql = "update cliente set nombre = ?, correo=?, tele=?, direccion = ?, cc=? where id = ?;";
        $bd = new MySQL();
        $comm = $bd->getMysqli();
        $stmp = $comm->prepare($sql);
        $id = $ClienteVO->getId();
        $cc = $ClienteVO->getCc();
        $correo = $ClienteVO->getCorreo();
        $tele = $ClienteVO->getTele();
        $direccion = $ClienteVO->getDireccion();
        $nombre = $ClienteVO->getNombre();
        $stmp->bind_param("sssssi", $nombre, $correo, $tele, $direccion, $cc, $id);
        $respuesta = array();
        $respuesta["success"] = false;
        if ($stmp->execute()) {
            $respuesta["success"] = true;
        }
        echo json_encode($respuesta);
    }

}
