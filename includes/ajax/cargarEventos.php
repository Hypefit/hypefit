<?php

use hypefit\DAO\EventosDAO;

require_once "../config.php";
require_once "../autorizacion.php";

$todos = htmlspecialchars(trim(strip_tags($_GET['todos'])));

$dao = new EventosDAO();
if ($todos) {
    $eventos = $dao->getAllEventos();
    echo json_encode($eventos);
}
else {
    $id = htmlspecialchars(trim(strip_tags($_GET['id'])));
    $eventos = $dao->getEventoPorId($id);
    echo json_encode($eventos);
}