<?php

use hypefit\Forms\CrearComentarioRutinaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesRutinas.php';

$tituloPagina = 'Hypefit | Ver rutina';

$contenidoPrincipal = "";
$idRutina = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$aux = mostrarRutina($idRutina) ;

if($aux==-1){
    header('Location:'.RUTA_APP.'/rutinas.php');
}
else{
    $contenidoPrincipal=$aux;
}

if (estaLogado() && $aux != -1) {
    $form = new CrearComentarioRutinaForm();
    $contenidoPrincipal .= $form->gestiona() ;
}

require __DIR__ . '/includes/comun/layout.php';
