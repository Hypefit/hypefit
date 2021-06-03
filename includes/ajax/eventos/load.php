<?php

use hypefit\DAO\EventosDAO;

include("../../config.php");

$data = [];

$dao = new EventosDAO();
$result = $dao->getAllEventos();
foreach($result as $evento) {
    $data[] = [
        'id'              => $evento->getId(),
        'title'           => $evento->getTitulo(),
        'start'           => $evento->getFechaInicio(),
        'end'             => $evento->getFechaFin(),
        'descripcion'     => $evento->getDescripcion()
    ];
}

echo json_encode($data);
