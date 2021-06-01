<?php

require_once "../config.php";

use hypefit\Forms\CrearRespuestaComentarioForm;

$idComentarioPadre = htmlspecialchars(trim(strip_tags($_GET["idComentarioPadre"])));
$idPost = htmlspecialchars(trim(strip_tags($_GET["idPost"])));

$array = array();
$form = new CrearRespuestaComentarioForm($idPost, $idComentarioPadre);
$array["html"] = $form->gestiona();
echo json_encode($array);




