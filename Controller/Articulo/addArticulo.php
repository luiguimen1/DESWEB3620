<?php
if($_POST){
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/VO/ArticuloVO.php';
    require '../../CLASS/DAO/ArticuloDAO.php';
    $ArticuloDAO = new ArticuloDAO();
    $ArticuloDAO->Almacenar($_POST);
}else{
    header("location:./");
}