<?php

use hypefit\Forms\CrearComentarioForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesPosts.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';

$tituloPagina = 'Hypefit | Ver post';

$idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$aux = mostrarPost($idPost);

if($aux == -1){
    header('Location:'.RUTA_APP.'/comunidad.php');
}
else {
    $contenidoPrincipal = mostrarJumbo("https://blog.grupo-pya.com/wp-content/uploads/2016/07/discussion-forums.jpg",
        "Comunidad", "Comparte con otros deportistas apasionados en nuestro foro");

    $contenidoPrincipal .= $aux;

    if (estaLogado()) {
        $form = new CrearComentarioForm();
        $contenidoPrincipal .= $form->gestiona();
    }
}
require __DIR__ . '/includes/comun/layout.php';
