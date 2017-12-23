<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteVO
 * Clase que permite Instanaciar un cliente para crear 
 * el objecto astracto del cliente
 * @author asus21
 * 
 */
class ClienteVO {
    //put your code here
    
    private $id;
    private $cc;
    private $nombre;
    private $correo;
    private $tele;
    private $direccion;
    
    function getDireccion() {
        return $this->direccion;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

        
    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;
    }
    
    /**
     * Metodo que retorna el valor de la CC del cliente
     * @return type
     */
    function getCc() {
        return $this->cc;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getTele() {
        return $this->tele;
    }

    function setCc($cc) {
        $this->cc = $cc;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setTele($tele) {
        $this->tele = $tele;
    }
    

}
