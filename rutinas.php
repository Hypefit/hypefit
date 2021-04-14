<?php
require_once __DIR__ . '/includes/config.php';
$tituloPagina = 'Hypefit | Rutinas';

$contenidoPrincipal = <<<EOS
		
		<div id="contenido">
			<h1> RUTINAS </h1>

EOS;
$contenidoPrincipal .= "<h2> ------------------- TREN SUPERIOR ------------------- </h2>"
$contenidoPrincipal .= crearListaRutinas(superior);
$contenidoPrincipal .= "<h2> ------------------- TREN INFERIOR ------------------- </h2>"
$contenidoPrincipal .= crearListaRutinas(inferior);
$contenidoPrincipal .= "<h2> --------------------- FULL BODY --------------------- </h2>"
$contenidoPrincipal .= crearListaRutinas(full);
$contenidoPrincipal .= "</div>";

require __DIR__ . '/includes/comun/layout.php';
