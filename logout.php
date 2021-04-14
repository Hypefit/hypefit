<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';

$tituloPagina= 'Hypefit | Logout';
$contenidoPrincipal='';

if(estaLogado())
{
    $contenidoPrincipal = <<<EOS
	<div id="contenido">
	<h1>Desconexión</h1>
    <?php
			
        	echo "Nombre:, {$_SESSION["nombre"]}";
        	echo "Tu tipo de usuario:, {$_SESSION["rol"]}";
		
    ?> 
	</div>
EOS;
}
else{
    $contenidoPrincipal = <<<EOS
    <div id="contenido">
	<h1>Desconexión</h1>
    <?php
			
        	echo "Nombre:, {$_SESSION["nombre"]}";
        	echo "Tu tipo de usuario:, {$_SESSION["rol"]}";
		
    ?> 
	</div>
EOS;

}
require __DIR__.'/includes/comun/layout.php';
