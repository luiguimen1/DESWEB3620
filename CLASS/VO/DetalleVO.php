<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleVO
 *
 * @author asus21
 */
class DetalleVO {

    //put your code here
    private $id;
    private $cant;
    private $precio;
    private $fk_orden;
    private $fk_articulo;
    
    function getId() {
        return $this->id;
    }

    function getCant() {
        return $this->cant;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getFk_orden() {
        return $this->fk_orden;
    }

    function getFk_articulo() {
        return $this->fk_articulo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCant($cant) {
        $this->cant = $cant;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setFk_orden($fk_orden) {
        $this->fk_orden = $fk_orden;
    }

    function setFk_articulo($fk_articulo) {
        $this->fk_articulo = $fk_articulo;
    }



}
