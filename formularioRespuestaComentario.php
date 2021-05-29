<?php


use hypefit\Forms\CrearComentarioForm;

require_once __DIR__ . '/includes/config.php';

$idComentario = $_GET["idComentario"];

$form = new CrearComentarioForm($idComentario);
echo $form->gestiona();



