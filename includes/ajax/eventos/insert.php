<?php

use hypefit\DAO\EventosDAO;
use hypefit\TO\Evento;

include("../../config.php");

if (isset($_POST['titulo'])) {

    $error      = null;
    $title      = htmlspecialchars(trim(strip_tags($_POST['titulo'])));
    $start      = htmlspecialchars(trim(strip_tags($_POST['fechaInicio'])));
    $end        = htmlspecialchars(trim(strip_tags($_POST['fechaFin'])));
    $descripcion  = htmlspecialchars(trim(strip_tags($_POST['descripcion'])));
    $idCreador = htmlspecialchars(trim(strip_tags($_POST['idCreador'])));

    //validation
    if ($title == '') {
        $error['title'] = 'Es necesario introducir un título';
    }

    if ($start == '') {
        $error['start'] = 'Es necesario introducir una fecha de inicio';
    }

    if ($end == '') {
        $error['end'] = 'Es necesario introducir una fecha de inicio';
    }

    if ($end == '') {
        $error['descripcion'] = 'Es necesario introducir una descripción';
    }

    //if there are no errors, carry on
    if (! isset($error)) {

        //format date
        $start = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $start)));
        $end = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $end)));
        
        $data['success'] = true;
        $data['message'] = 'Success!';

        //store
        $evento = new Evento();
        $dao = new EventosDAO();
        $evento->setIdCreador($idCreador);
        $evento->setTitulo($title);
        $evento->setFechaInicio($start);
        $evento->setFechaFin($end);
        $evento->setDescripcion($descripcion);
        $dao->crearEvento($evento);
    } else {
        $data['success'] = false;
        $data['errors'] = $error;
    }

    echo json_encode($data);
}
