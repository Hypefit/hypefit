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
	require("cabecera.php");
	?>

	<div id="contenido">
		<h1>Haz login en Hypefit</h1>
		<form action="includes/procesarLogin.php" method="POST">
		<fieldset>
		<legend>Usuario y contraseña</legend>
			<p><label>Email:</label> <input type="email" name="email" /></p>
			<p><label>Contraseña:</label> <input type="password" name="password" /></p>
			<button type="submit">Entrar</button>
		</fieldset>
	</form>
	</div>
	
	<?php
	  #include("sidebarDer.php");
	  #include("pie.php");
	?>

</div> <!-- Fin del contenedor -->
</body>
</html>
