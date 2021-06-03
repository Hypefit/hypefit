<?php

use hypefit\DAO\RutinaDAO;
use hypefit\DAO\RutinasUsuariosDAO;

require_once "../config.php";
require_once "../autorizacion.php";

$dao = new RutinasUsuariosDAO();
$numRutinasCompletadas = $dao->getNumRutinasCompletadas(idUsuarioLogado());

$dao = new RutinaDAO();
$numRutinasTotales = $dao->getNumRutinas();

$array['primeraRutina'] = $numRutinasCompletadas === 1;
$array['todasCompletadas'] = $numRutinasCompletadas === $numRutinasTotales;
echo json_encode($array);
