<?php

require_once "../config.php";

use hypefit\Forms\CrearComentarioForm;

$idComentarioPadre = htmlspecialchars(trim(strip_tags($_GET["idComentarioPadre"])));
$idPost = htmlspecialchars(trim(strip_tags($_GET["idPost"])));

$array = array();
$form = new CrearComentarioForm($idPost, $idComentarioPadre);
$array["html"] = $form->gestiona();
echo json_encode($array);




