<?php
if ($_POST) {
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/DAO/ArticuloDAO.php';
    require '../../CLASS/VO/ArticuloVO.php';
    $ArticuloDAO = new ArticuloDAO();
    $data = $ArticuloDAO->buscarXNombre($_POST);
    $cadena = '[ ';
    if ($data != 0) {
        $ArticuloVO = new ArticuloVO();
        $limit = sizeof($data);
        for ($i = 0; $i < $limit; $i++) {
            $tmp = $data[$i];
            $ArticuloVO->setNombre($tmp["data"]);
            $cadena .= '"' . $ArticuloVO->getNombre() . '"';
            if ($i < $limit - 1) {
                $cadena .= ', ';
            }
        }
    }
    $cadena .= ' ]';
    echo $cadena;
}