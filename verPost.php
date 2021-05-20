<?php

use hypefit\Forms\CrearComentarioForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesPosts.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';

$tituloPagina = 'Hypefit | Ver post';

$contenidoPrincipal = mostrarJumbo("https://blog.grupo-pya.com/wp-content/uploads/2016/07/discussion-forums.jpg",
    "Comunidad", "Comparte con otros deportistas apasionados en nuestro foro");


$idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$contenidoPrincipal .= mostrarPost($idPost);

if (estaLogado()) {
	$form = new CrearComentarioForm();	
    $contenidoPrincipal .= $form->gestiona();
}

require __DIR__ . '/includes/comun/layout.php';
