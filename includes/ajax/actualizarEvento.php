<?php

use hypefit\DAO\EventosDAO;
use hypefit\TO\Evento;

require_once "../config.php";
require_once "../autorizacion.php";

$id = htmlspecialchars(trim(strip_tags($_POST['id'])));
$idCreador = htmlspecialchars(trim(strip_tags($_POST['idCreador'])));
$titulo = htmlspecialchars(trim(strip_tags($_POST['titulo'])));
$fechaInicio = htmlspecialchars(trim(strip_tags($_POST['fechaInicio'])));
$fechaFin = htmlspecialchars(trim(strip_tags($_POST['fechaFin'])));
$descripcion = htmlspecialchars(trim(strip_tags($_POST['descripcion'])));

$evento = new Evento();
$dao = new EventosDAO();
$evento->setId($id);
$evento->setIdCreador($idCreador);
$evento->setTitulo($titulo);
$evento->setFechaInicio($fechaInicio);
$evento->setFechaFin($fechaFin);
$evento->setDescripcion($descripcion);

if ($dao->actualizarEvento($evento)){
    $array['success'] = true;
    echo json_encode($array);
}

