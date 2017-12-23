<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrdenVO
 *
 * @author asus21
 */
class OrdenVO {
    //put your code here
    private $id;
    private $fecha;
    private $fk_cliente;
    private $estado;
    private $direccion;
    private $tele;
    private $correo;
    private $token;
    
    function getToken() {
        return $this->token;
    }

    function setToken($token) {
        $this->token = $token;
    }

        
    
    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getFk_cliente() {
        return $this->fk_cliente;
    }

    function getEstado() {
        return $this->estado;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTele() {
        return $this->tele;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setFk_cliente($fk_cliente) {
        $this->fk_cliente = $fk_cliente;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTele($tele) {
        $this->tele = $tele;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }
    
    
}
