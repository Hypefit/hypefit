<?php

use hypefit\DAO\EventosDAO;

require_once "../config.php";
require_once "../autorizacion.php";

$id = htmlspecialchars(trim(strip_tags($_POST['id'])));

$dao = new EventosDAO();
$idCreador = $dao->getIdCreadorEvento($id);
$array['esCreador'] = $idCreador === idUsuarioLogado();
echo json_encode($array);