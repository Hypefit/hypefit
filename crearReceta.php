<?php

use \hypefit\Forms\CrearRecetaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';

$tituloPagina = 'Hypefit | Crear Receta';
$contenidoPrincipal = "<h1> Nueva receta </h1>";

if( (esNutricionista() && estaAprobado()) || esAdmin()){
	$form = new CrearRecetaForm();
	$contenidoPrincipal .= $form->gestiona();
}
else{
    $contenidoPrincipal .= "<p>No eres nutricionista de Hypefit o tu cuenta todavía no ha sido aprobada.</p>";
}

require __DIR__ . '/includes/comun/layout.php';