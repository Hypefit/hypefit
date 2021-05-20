<?php

use hypefit\Forms\CrearPostForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';


$tituloPagina = 'Hypefit | Crear Post';
$contenidoPrincipal = "";

if(estaLogado()) {
	$form = new CrearPostForm();
    $contenidoPrincipal .= $form->gestiona();
}
else {
    $contenidoPrincipal .= mostrarJumboBoton("https://www.aurigasv.es/img/error-code.jpeg",
        "Debes estar autenticado para crear un post", "", "login.php",
        "Login");
}

require __DIR__ . '/includes/comun/layout.php';
