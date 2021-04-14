<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';
require_once __DIR__.'/includes/funcionesUsuario.php';

$tituloPagina= 'Hypefit | Logout';


$contenidoPrincipal = <<<EOS
	<div id="contenido">
        <h1>Desconexión</h1>			
        <p>Hasta otra, {$_SESSION["nombre"]}</p>
	</div>
EOS;

logout();

require __DIR__.'/includes/comun/layout.php';
