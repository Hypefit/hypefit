<?php

use hypefit\Forms\CrearComentarioForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesPosts.php';

$tituloPagina = 'Hypefit | Ver post';

$idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$contenidoPrincipal = mostrarPost($idPost);
if (estaLogado()) {
	$form = new CrearComentarioForm();	
    $contenidoPrincipal .=  $form->gestiona();
}

require __DIR__ . '/includes/comun/layout.php';
