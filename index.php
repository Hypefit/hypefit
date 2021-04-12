<?php
require_once __DIR__.'/includes/config.php';
$tituloPagina= 'Hypefit | Inicio';

$contenidoPrincipal = <<<EOS
		
		<div id="contenido">
			<p>  Bienvenido a HYPEFIT</p>
			<img src="img/inicio.jpg" alt="Imagen principal pagina inicio">
			<p> CALENDARIO ACTIVIDADES</p>
			<img src="img/calendario-abril-2021.jpg" alt="Imagen calendario provisional">
			<p> ¿QUIÉNES SOMOS?
            Hypefit es un innovador gimnasio online que incluye tanto recetas como rutinas equilibradas y pensadas para
            los distintas necesidades de nuestro clientes</p>
            <a href="quienesSomos.php">Ver más</a>
		</div>
EOS;

require __DIR__.'/includes/comun/layout.php';