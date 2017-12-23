<?php

class Datos {
    
    private $hostname = 'localhost';
    private $usuario = 'id4095846_desweb3620';
    private $clave = 'desweb3620';
    private $db = 'id4095846_desweb3620';

    function getPre() {
        return $this->pre;
    }

    public function Datos() {
        
    }

    public function get_hostname() {
        return $this->hostname;
    }

    public function get_usuario() {
        return $this->usuario;
    }

    public function get_clave() {
        return $this->clave;
    }

    public function get_DB() {
        return $this->db;
    }

}
