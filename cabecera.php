<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Hypefit</title>
  <link rel="icon" 
    type="image/png" 
    href="img/favicon.png">
</head>

<body>
<div id="cabecera">
	<h1>Hypefit</h1>
	<img src="img/logo.png" alt="Hypefit logo">
	<div class="saludo">
		<?php
			if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
				echo "Bienvenido, {$_SESSION['nombre']} <a href='logout.php'>(salir)</a>";
			}
			else {
				echo "Usuario desconocido. <a href='login.php'>Login</a> <a href='registro.php'>Registro</a>";
			}
		?>
	</div>
</div>
</body>
</html>