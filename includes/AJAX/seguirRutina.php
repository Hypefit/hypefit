<?php

use hypefit\DAO\RutinasUsuariosDAO;

require_once "../config.php";
require_once "../autorizacion.php";

$idRutina = htmlspecialchars(trim(strip_tags($_POST["idRutina"])));
$estado = htmlspecialchars(trim(strip_tags($_POST["estado"])));
$idUsuario = idUsuarioLogado();

$dao = new RutinasUsuariosDAO();
switch ($estado) {
    case "dejarSeguir":
        $dao->dejarDeSeguir($idUsuario, $idRutina);
        break;
    case "seguir":
        $dao->empezarASeguir($idUsuario, $idRutina);
        break;
    case "completar":
        $dao->marcarComoCompletada($idUsuario, $idRutina);
        break;
}
