<?php session_start(); ?>
	<html lang="es"> 
		<head>
		<link rel="stylesheet" type="text/css" href="estilo.css" />
		<meta charset="utf-8">
		<title>Hypefit | Login</title>

		<link rel="icon" 
		type="image/png" 
		href="img/favicon.png">
	</head>
	
	<body>
		<div id="contenedor">
		<?php
		require("includes/comun/cabecera.php");
		?>
		
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
		<?php
			require("includes/comun/pie.php");
		?>
</div>
</body>
</html>