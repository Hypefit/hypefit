<?php

use \hypefit\Forms\CrearRecetaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';

$tituloPagina = 'Hypefit | Crear Receta';
$contenidoPrincipal = "";

if( (esNutricionista() && estaAprobado()) || esAdmin()){
	$form = new CrearRecetaForm();
	$contenidoPrincipal .= $form->gestiona();
}
else{
    $contenidoPrincipal .= '
<div class="p-4 text-center bg-image img-fluid" style="
            background-image: url(https://www.aurigasv.es/img/error-code.jpeg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
    <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%; padding: 15%">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-black">';
    if (estaLogado() && (!esNutricionista())) {
        $contenidoPrincipal .= '
                <h4 class="text-uppercase">Debes ser nutricionista Hypefit para poder crear una nueva receta</h4 >';
    }
    else if((esNutricionista() && !estaAprobado())){
        $contenidoPrincipal .= '
                <h4 class="text-uppercase">Tu cuenta de nutricionista Hypefit todavía no ha sido aprobada .</h4 >';
    }
    else {
        $contenidoPrincipal .= '
                <h5 class="text-uppercase">No estás autenticado. Puedes hacer login pulsando 
                    <a class="text-reset" href="login.php">aquí</a>
                </h5>';
    }
    $contenidoPrincipal .= '
            </div>
        </div>
    </div>
</div>';

}

require __DIR__ . '/includes/comun/layout.php';