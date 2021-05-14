<?php

use hypefit\Forms\CrearComentarioRutinaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesRutinas.php';

$tituloPagina = 'Hypefit | Ver rutina';

$idRutina = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));

$contenidoPrincipal = "
    <!--<div class='bg-light container-fluid px-3 shadow'>
        <div class='container py-5 '>
            <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>-->"
                . mostrarRutina($idRutina) ."
           <!-- </div>
        </div>
    </div>-->
";

if (estaLogado()) {
    $form = new CrearComentarioRutinaForm();
    $contenidoPrincipal .= $form->gestiona() ;
}

require __DIR__ . '/includes/comun/layout.php';
