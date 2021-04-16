<?php
require_once __DIR__.'/includes/config.php';
$tituloPagina= 'Hypefit | Inicio';

$contenidoPrincipal = <<<EOS
		
		<div id="contenido">
			<h1>  Bienvenido a HYPEFIT</h1>
			<img src="img/inicio.jpg" alt="Imagen principal pagina inicio">
			<h3>RUTINAS DE ENTRENAMIENTO</h3>
			<p>Visita nuestra página de <a href="rutinas.php">rutinas</a> y mantente en forma.</p>
			<h3>RECETAS</h3>
			<p>Un buen calendario de entrenamientos no sirve de nada sin una buena alimentación.
			Nuestras <a href="recetas.php">recetas</a> preparadas por nutricionistas te ayudarán a conseguir 
			tus objetivos.</p>
			<h4>CALENDARIO ACTIVIDADES</h4>
			<img src="img/calendario-abril-2021.jpg" alt="Imagen calendario provisional">
			<h4>¿QUIÉNES SOMOS?</h4>
            <p>Hypefit es un innovador gimnasio online que incluye tanto recetas como rutinas equilibradas y pensadas para
            los distintas necesidades de nuestro clientes.</p>
            <a href="quienesSomos.php">Ver más</a>
		</div>
EOS;

require __DIR__.'/includes/comun/layout.php';