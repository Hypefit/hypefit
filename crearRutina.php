<?php

use \hypefit\Forms\CrearRutinaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';

$tituloPagina = 'Hypefit | Crear Rutina';
$contenidoPrincipal = "<h1> Nueva rutina </h1>";

if( (esEntrenador() && estaAprobado()) || esAdmin()){
	$form = new CrearRutinaForm();
	$contenidoPrincipal .= $form->gestiona();
}
else{
    $contenidoPrincipal .= "<p>No eres entrenador de Hypefit o tu cuenta todavía no ha sido aprobada.</p>";
}

require __DIR__ . '/includes/comun/layout.php';