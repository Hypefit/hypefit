<?php
require_once __DIR__ . '/includes/config.php';
$tituloPagina = 'Hypefit | Foro';

$contenidoPrincipal = <<<EOS
		
		<div id="contenido">
			<h1> FORO DE LA COMUNIDAD </h1>

EOS;
$contenidoPrincipal .= "<h2> ------------------- LISTA DE NUESTROS POSTS ------------------- </h2>"
$contenidoPrincipal .= crearListaPosts();

$contenidoPrincipal .= "</div>";

require __DIR__ . '/includes/comun/layout.php';
