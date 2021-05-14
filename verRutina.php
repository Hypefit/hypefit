<?php

use hypefit\Forms\CrearComentarioRutinaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesRutinas.php';

$tituloPagina = 'Hypefit | Ver rutina';

$idRutina = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));

list($num ,$contenidoPrincipal) = mostrarRutina($idRutina) ;


if (estaLogado() && $num != -1) {
    $form = new CrearComentarioRutinaForm();
    $contenidoPrincipal .= $form->gestiona() ;
}

require __DIR__ . '/includes/comun/layout.php';
