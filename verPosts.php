<?php

require_once __DIR__ . '/includes/config.php';
$tituloPagina = 'Hypefit | Posts';

$contenidoPrincipal = '<div id=" contenido">';
$contenidoPrincipal .= mostrarPost($_REQUEST["id"]);
$contenidoPrincipal .= '</div>';


require __DIR__ . '/includes/comun/layout.php';
