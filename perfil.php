<?php  
require_once __DIR__.'/includes/config.php';

$tituloPagina= 'Hypefit | Perfil';
$contenidoPrincipal='';

if(isset($_SESSION["login"]))
{
	$contenidoPrincipal = <<<EOS
	<div id="contenido">
	<h1>Tu Perfil</h1>
    <?php
			
        	echo "Nombre:, {$_SESSION["nombre"]}";
        	echo "Tu tipo de usuario:, {$_SESSION["rol"]}";
		
    ?> 
	</div>
EOS;
}
require __DIR__.'/includes/comun/layout.php';

