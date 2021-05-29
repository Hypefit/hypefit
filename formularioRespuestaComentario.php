<?php


use hypefit\Forms\CrearComentarioForm;

require_once __DIR__ . '/includes/config.php';

$idComentario = $_GET["idComentario"];

$array = array();
$form = new CrearComentarioForm($idComentario);
$array["html"] = $form->gestiona();
echo json_encode($array);




