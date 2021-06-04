<?php

use hypefit\Forms\CrearComentarioRecetaForm;

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesRecetas.php';

$tituloPagina = 'Hypefit | Ver receta';

$contenidoPrincipal = "";
$idReceta = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$aux = mostrarReceta($idReceta);

if($aux==-1){
    header('Location:'.RUTA_APP.'/recetas.php');
}
else{
    $contenidoPrincipal = $aux;
}

if (estaLogado() && $aux != -1 && !esCreador($idReceta)) {
    $form = new CrearComentarioRecetaForm();
    $contenidoPrincipal .= $form->gestiona();
}

require __DIR__ . '/includes/comun/layout.php';