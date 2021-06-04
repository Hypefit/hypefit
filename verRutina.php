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

if (estaLogado() && $aux != -1 && !esCreador($idRutina)) {
    $form = new CrearComentarioRutinaForm();
    $contenidoPrincipal .= $form->gestiona();
}

//Notificaciones mostradas al obtener insignias "Primera rutina completada" y "Todas las rutinas completadas"
$contenidoPrincipal .=<<<EOS
    <div class="position-fixed bottom-0 end-0 p-3 notificacion-insignia">
        <div id="notificacionPrimeraCompletada" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="img/insignias/notificacion.png" class="rounded me-2" alt="Icono de notificación">
                <strong class="me-auto">Nueva insignia</strong>
                <small>justo ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ¡Acabas de obtener la insignia "Primera rutina completada"! <a href="perfil.php">Pulsa aquí para verla</a>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3 notificacion-insignia">
        <div id="notificacionTodasCompletadas" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="img/insignias/notificacion.png" class="rounded me-2" alt="Icono de notificación">
                <strong class="me-auto">Nueva insignia</strong>
                <small>justo ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ¡Acabas de obtener la insignia "Todas las rutinas completadas"! <a href="perfil.php">Pulsa aquí para verla</a>
            </div>
        </div>
    </div>
    EOS;

$scripts = array();
$ruta = RUTA_JS . "/seguirRutinas.js";
array_push($scripts, $ruta);

require __DIR__ . '/includes/comun/layout.php';
