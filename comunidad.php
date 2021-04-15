<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesPosts.php';

$tituloPagina = 'Hypefit | Foro';

$contenidoPrincipal = <<<EOS
		
		<div id="contenido">
			<h1> COMUNIDAD HYPEFIT </h1>
EOS;

$contenidoPrincipal .= "<h2> ------------------- FORO ------------------- </h2>";
$contenidoPrincipal .= crearListaPosts();
$contenidoPrincipal .= "</div>";

require __DIR__ . '/includes/comun/layout.php';
