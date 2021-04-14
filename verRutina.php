<?php

require_once __DIR__ . '/includes/config.php';
$tituloPagina = 'Hypefit | Rutinas';

$contenidoPrincipal = '<div id="contenido">';
$contenidoPrincipal .= mostrarRutina($_REQUEST["id"]);
$contenidoPrincipal .= "</div>";

require __DIR__ . '/includes/comun/layout.php';
