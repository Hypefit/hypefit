<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es"> 
<head> 
	<!--<link rel="stylesheet" type="text/css" href="estilo.css" />-->
	<meta charset="utf-8">
	<title>Hypefit | Registro</title>
  <link rel="icon" 
    type="image/png" 
    href="img/favicon.png">
</head>

<body>
	<div id="contenedor">
		<?php
		require("includes/comun/cabecera.php");
		#require("sidebarIzq.php");
		?>

		<div id="contenido">
			<h1>Regístrate a Hypefit</h1>
			<form action="procesarLogin.php" method="POST">
				<fieldset>
					<legend>Usuario y contraseña</legend>
					<p><label>Name:</label> <input type="text" name="nombre" /></p>
					<p><label>Password:</label> <input type="password" name="password" /></p>
					<p><label>Email:</label> <input type="email" name="email" /></p>
					<button type="submit">Entrar</button>
				</fieldset>
			</form>
		</div>
		<br/>
		<?php
			#include("sidebarDer.php");
			include("includes/comun/pie.php");
		?>
	</div> <!-- Fin del contenedor -->
</body>
</html>