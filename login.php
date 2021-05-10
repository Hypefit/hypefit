<?php

use hypefit\Forms\LoginForm;

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';

$tituloPagina= 'Hypefit | Login';
$contenidoPrincipal = "<h1>Haz login en Hypefit</h1>";

if (!estaLogado()) {
    $form = new LoginForm();
    $contenidoPrincipal .= $form->gestiona();
} else {
    $contenidoPrincipal .=  '<p>¡Ya has iniciado sesión! Puedes acceder a <a href="perfil.php">tu perfil</a> o <a href="logout.php">desconectarte</a>.</p>';
}

	
require __DIR__.'/includes/comun/layout.php';