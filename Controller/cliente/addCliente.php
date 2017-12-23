<?php
if($_POST){
    session_start();
    session_name("clienteUp");
    /*
    $data = json_decode(json_encode($_POST));
    echo "la cedula es ".$data->cc."\n";
    echo "El nombre es ".$data->nombre."\n";
    $data->nombre="luis";
    echo "El nombre es ".$data->nombre."\n";
    */
    //print_r($data);
    require '../../CLASS/VO/ClienteVO.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/BD/datos.php';
    $ClienteDAO = new ClienteDAO();
    if(isset($_SESSION["clienteUp"])){
       $ClienteVO = unserialize($_SESSION["clienteUp"]); 
       $_POST["cod"]=$ClienteVO->getId();
       $ClienteDAO->clienteUpdate($_POST);
    }else{
        $ClienteDAO->agregar($_POST);
    }
    
    
    
    
}else{
    header("Location:./");
}