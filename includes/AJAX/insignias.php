<?php

use hypefit\DAO\InsigniasDAO;
use hypefit\DAO\InsigniasUsuariosDAO;

require_once "../config.php";
require_once "../autorizacion.php";

$nombreInsignia = htmlspecialchars(trim(strip_tags($_POST["nombreInsignia"])));
$idUsuario = idUsuarioLogado();
$peticion = htmlspecialchars(trim(strip_tags($_POST["peticion"])));

$dao = new InsigniasDAO();
$insignia = $dao->buscarInsigniaPorNombre($nombreInsignia);
if (!$insignia) {
    $array['error'] = true;
    echo json_encode($array);
    return;
}

$idInsignia = $insignia->getId();
switch ($peticion) {
    case "buscar":
        $dao = new InsigniasUsuariosDAO();
        $existe = $dao->existeInsignia($idUsuario, $idInsignia);
        $array['existe'] = $existe;
        echo json_encode($array);
        break;
    case "insertar":
        $dao = new InsigniasUsuariosDAO();
        $resultado = $dao->insertar($idUsuario, $idInsignia);
        if ($resultado === 0) {
            $array['titulo'] = $insignia->getTitulo();
            $array['descripcion'] = $insignia->getDescripcion();
            $array['rutaImagen'] = $insignia->getRutaImagen();
        }
        else{
            $array['error'] = true;
        }
        echo json_encode($array);
}