<?php

use hypefit\Forms\CrearComentarioForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesPosts.php';

$tituloPagina = 'Hypefit | Ver post';
$contenidoPrincipal = <<<EOS
<div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://blog.grupo-pya.com/wp-content/uploads/2016/07/discussion-forums.jpg);
    opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
    <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%; padding: 5%">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                <h2 class='mb-3 text-uppercase'>Comunidad Hypefit</h2>
                <h5 class='mb-4'>Comparte con otros deportistas apasionados en nuestro foro</h5>
                </div>
            </div>
        </div>
    </div>
</div>
EOS;
$idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$contenidoPrincipal .= mostrarPost($idPost);

if (estaLogado()) {
	$form = new CrearComentarioForm();	
    $contenidoPrincipal .=  $form->gestiona();
}

require __DIR__ . '/includes/comun/layout.php';
