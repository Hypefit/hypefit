<?php

use hypefit\Forms\RegistroForm;

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';
require_once __DIR__.'/includes/comun/jumbotron.php';


$tituloPagina= 'Hypefit | Registro';
$contenidoPrincipal = '<h1>Regístrate en Hypefit</h1>';

if (!estaLogado()) {
    $form = new RegistroForm();
    $contenidoPrincipal .= $form ->gestiona();
} else {
    $contenidoPrincipal = mostrarJumbo("https://www.aurigasv.es/img/error-code.jpeg",
        "¡Ya has iniciado sesión!", "Sigue descubriendo nuestra web...");
}

require __DIR__.'/includes/comun/layout.php';