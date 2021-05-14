<?php

use hypefit\Forms\CalculadoraForm;

require_once __DIR__.'/includes/config.php';

$tituloPagina= 'Hypefit | Registro';
$contenidoPrincipal = '<h1>Regístrate en Hypefit</h1>';


$form = new CalculadoraForm();
$contenidoPrincipal .= $form ->gestiona();


require __DIR__.'/includes/comun/layout.php';