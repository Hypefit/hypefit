<?php

use \hypefit\Forms\CrearRutinaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';

$tituloPagina = 'Hypefit | Crear Rutina';

if( (esEntrenador() && estaAprobado()) || esAdmin()){
	$form = new CrearRutinaForm();
    $contenidoPrincipal = $form->gestiona();
}
else if (estaLogado()) {
    $titulo = "";
    if (!esEntrenador()){
        $titulo = "Debes ser entrenador Hypefit para poder crear una nueva rutina";
    }
    else if ((esEntrenador() && !estaAprobado())) {
        $titulo = "Tu cuenta de entrenador Hypefit todavía no ha sido aprobada";
    }
    $contenidoPrincipal = mostrarJumbo("https://www.aurigasv.es/img/error-code.jpeg", $titulo, "");
}
else {
    $titulo = "No has iniciado sesión";
    $subtitulo = "Puedes hacerlo aquí";
    $contenidoPrincipal = mostrarJumboBoton("https://www.aurigasv.es/img/error-code.jpeg", $titulo,
        $subtitulo, "login.php", "Login");
}


require __DIR__ . '/includes/comun/layout.php';