<?php

use hypefit\Forms\CrearNoticiaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';


$tituloPagina = 'Hypefit | Crear Noticia';
$contenidoPrincipal = "";

if(esAdmin() || ((esEntrenador() || esNutricionista()) && estaAprobado())) {
	$form = new CrearNoticiaForm();
    $contenidoPrincipal .= $form->gestiona();
}
else {
    $contenidoPrincipal .= mostrarJumboBoton("https://www.aurigasv.es/img/error-code.jpeg",
        "Debes estar autenticado para escribir una noticia", "", "login.php",
        "Login");
}

require __DIR__ . '/includes/comun/layout.php';