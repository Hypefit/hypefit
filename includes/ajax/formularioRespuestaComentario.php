<?php

require_once "../config.php";

use hypefit\Forms\CrearComentarioForm;

$idComentarioPadre = htmlspecialchars(trim(strip_tags($_GET["idComentarioPadre"])));
$idPost = htmlspecialchars(trim(strip_tags($_GET["idPost"])));
$es_Respuesta = htmlspecialchars(trim(strip_tags($_GET["es_Respuesta"])));

$array = array();
$form = new CrearComentarioForm($idPost, $idComentarioPadre, $es_Respuesta);
$array["html"] = $form->gestiona();
echo json_encode($array);




