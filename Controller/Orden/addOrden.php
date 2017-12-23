<?php
if($_POST){
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/VO/OrdenVO.php';
    require '../../CLASS/DAO/OrdenDAO.php';
    session_start();
    session_name("idFactura");
    session_name("IdCliente");
    $OrdenDAO = new OrdenDAO();
    $OrdenDAO->addOrden($_POST);
}else{
    header("location:./");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

