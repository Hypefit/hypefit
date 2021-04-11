<div id="cabecera">
	<img src="img/logo.png" alt="Hypefit logo">
	
	<div class="saludo">
		
		<a href="index.php">Inicio</a>
		<a href="rutinas.php">Rutinas</a>
		<a href="recetas.php">Recetas</a>
		<a href="comunidad.php">Comunidad</a>
			
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
