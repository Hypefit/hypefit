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
    $contenidoPrincipal = "<p>No estás autenticado. Puedes entrar pulsando <a href='login.php'>aquí</a></p>";
}

require __DIR__ . '/includes/comun/layout.php';