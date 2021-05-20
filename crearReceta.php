<?php

use \hypefit\Forms\CrearRecetaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';

$tituloPagina = 'Hypefit | Crear Receta';

if( (esNutricionista() && estaAprobado()) || esAdmin()){
	$form = new CrearRecetaForm();
	$contenidoPrincipal = $form->gestiona();
}
else if (estaLogado()){
    $subtitulo = "";
    $titulo = "";
    if ((!esNutricionista()))
        $titulo = "Debes ser nutricionista Hypefit para poder crear una nueva receta";
    else if((esNutricionista() && !estaAprobado()))
        $titulo = "Tu cuenta de nutricionista Hypefit todavía no ha sido aprobada";

    $contenidoPrincipal= mostrarJumbo("https://www.aurigasv.es/img/error-code.jpeg", $titulo, $subtitulo);

}
else{
    $titulo = "No has iniciado sesión";
    $subtitulo = "Puedes hacerlo aquí";
    $contenidoPrincipal = mostrarJumboBoton("https://www.aurigasv.es/img/error-code.jpeg", $titulo,
    $subtitulo, "login.php", "Login");
}

require __DIR__ . '/includes/comun/layout.php';