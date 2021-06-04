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
        $form = new CrearComentarioForm($idPost, null);
        $contenidoPrincipal .= $form->gestiona();
    }

    //Notificación mostrada al obtener insignia "Primer post"
    $contenidoPrincipal .=<<<EOS
    <div class="position-fixed bottom-0 end-0 p-3 notificacion-insignia">
        <div id="notificacionPrimerPost" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="img/insignias/notificacion.png" class="rounded me-2" alt="Icono de notificación">
                <strong class="me-auto">Nueva insignia</strong>
                <small>justo ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ¡Acabas de obtener la insignia "Primer post"! <a href="perfil.php">Pulsa aquí para verla</a>
            </div>
        </div>
    </div>
    EOS;

    $scripts = array();
    array_push($scripts, 'js/respuestaComentario.js');
    array_push($scripts, 'js/insigniaCrearPost.js');
}
require __DIR__ . '/includes/comun/layout.php';
