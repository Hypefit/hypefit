<?php

use hypefit\DAO\EventosDAO;

include("../../config.php");

if (isset($_POST['id'])) {
    $dao = new EventosDAO();
    $id = htmlspecialchars(trim(strip_tags($_POST['id'])));
    $evento = $dao->getEventoPorId($id)[0];
    $data = [
        'id'        => $evento->getId(),
        'title'     => $evento->getTitulo(),
        'start'     => date('d-m-Y H:i:s', strtotime($evento->getFechaInicio())),
        'end'       => date('d-m-Y H:i:s', strtotime($evento->getFechaFin())),
        'idCreador'     => $evento->getIdCreador(),
        'descripcion' => $evento->getDescripcion()
    ];

    echo json_encode($data);
}
