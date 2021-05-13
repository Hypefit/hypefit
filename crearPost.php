<?php

use hypefit\Forms\CrearPostForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';

$tituloPagina = 'Hypefit | Crear Post';
$contenidoPrincipal = "<h1> Nuevo post </h1>";

if(estaLogado()) {
	$form = new CrearPostForm();
    $contenidoPrincipal .= $form->gestiona();
}
else {
    $contenidoPrincipal .= <<<EOS

<div class="p-4 text-center bg-image img-fluid"
        style="
            background-image: url(https://www.aurigasv.es/img/error-code.jpeg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
    <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%; padding: 15%">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                    <h5 class="text-uppercase">No estás autenticado. Puedes hacer login pulsando
                        <a class="text-reset" href='login.php'>aquí</a>
                    </h5>
                </div>
            </div>    
        </div>
    </div>
</div>
         
EOS;
}

require __DIR__ . '/includes/comun/layout.php';
