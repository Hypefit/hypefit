<?php

use hypefit\DAO\EventosDAO;
use hypefit\TO\Evento;

include("../../config.php");

if (isset($_POST['id'])) {

    //collect data
    $error = null;
    $id = htmlspecialchars(trim(strip_tags($_POST['id'])));
    $idCreador = htmlspecialchars(trim(strip_tags($_POST['idCreador'])));
    $title = htmlspecialchars(trim(strip_tags($_POST['titulo'])));
    $start = htmlspecialchars(trim(strip_tags($_POST['fechaInicio'])));
    $end = htmlspecialchars(trim(strip_tags($_POST['fechaFin'])));
    $descripcion = htmlspecialchars(trim(strip_tags($_POST['descripcion'])));

    //validation
    if ($start == '') {
        $error['start'] = 'Es necesario introducir una fecha de inicio';
    }

    if ($end == '') {
        $error['end'] = 'Es necesario introducir una fecha de fin';
    }

    //if there are no errors, carry on
    if (! isset($error)) {

        //reformat date
        $start = date('Y-m-d H:i:s', strtotime($start));
        $end = date('Y-m-d H:i:s', strtotime($end));
        
        $data['success'] = true;
        $data['message'] = 'Success!';

        $evento = new Evento();
        $dao = new EventosDAO();
        $evento->setId($id);
        $evento->setIdCreador($idCreador);
        $evento->setTitulo($title);
        $evento->setFechaInicio($start);
        $evento->setFechaFin($end);
        $evento->setDescripcion($descripcion);
        $dao->actualizarEvento($evento);
    } else {
        $data['success'] = false;
        $data['errors'] = $error;
    }

    echo json_encode($data);
}