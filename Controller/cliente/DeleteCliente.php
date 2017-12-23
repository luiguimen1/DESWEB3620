<?php
if($_POST){
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/VO/ClienteVO.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    $modi=true;
    if($modi==true){
       $ClienteDAO = new ClienteDAO();
       $ClienteDAO->deleteCliente($_POST);
    }
    
}else{
    header("location:./");
}

