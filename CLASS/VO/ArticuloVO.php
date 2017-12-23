<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticuloVO
 *
 * @author asus21
 */
class ArticuloVO {
    /**
     * Metodo que terno el ID
     * @return type Variable de tipo Entera
     */
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    private $id;
    private $nombre;
    private $precio;
    private $detalle;
      
}
