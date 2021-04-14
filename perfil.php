<?php  
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';

$tituloPagina= 'Hypefit | Perfil';
$contenidoPrincipal='';

if(estaLogado())
{
	$contenidoPrincipal = <<<EOS
	<div id="contenido">
	<h1>Tu Perfil</h1>
        <p>Nombre:{$_SESSION["nombre"]}</p>
        <p>Tu tipo de usuario: {$_SESSION["rol"]}</p>	
	</div>
EOS;
}
require __DIR__.'/includes/comun/layout.php';

