<?php
if($_POST){
    require '../../CLASS/BD/datos.php';   
    require '../../CLASS/BD/MySQLi.php';   
    require '../../CLASS/VO/ClienteVO.php';   
    require '../../CLASS/DAO/ClienteDAO.php';
    session_start();
    session_name("IdCliente");
    $ClienteDAO = new ClienteDAO();
    $ClienteDAO->clienteXCC($_POST);
}else{
    header("location:./");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

