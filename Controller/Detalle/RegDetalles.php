<?php
if($_POST){
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/VO/DetalleVO.php';
    require '../../CLASS/DAO/DetalleDAO.php';
    session_start();
    session_name("idFactura");
    $_POST["idFac"] = $_SESSION["idFactura"];
    $DetalleDAO = new DetalleDAO();
    $DetalleDAO->crearDetalle($_POST);
}else{
    header("location:./");
}