<div id="cabecera">
	<img src="<?=RUTA_IMGS.'/logo.png'?>" alt="Hypefit logo">
	
	<div class="saludo">
		
		<a href="<?=RUTA_APP.'/index.php'?>">Inicio</a>
		<a href="<?=RUTA_APP.'/rutinas.php'?>">Rutinas</a>
		<a href="<?=RUTA_APP.'/recetas.php'?>">Recetas</a>
		<a href="<?=RUTA_APP.'/comunidad.php'?>">Comunidad</a>
			
		<?php
			if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
				echo "Bienvenido, {$_SESSION['nombre']} <a href='".RUTA_APP."/logout.php'>(salir)</a>";
			}
			else {
				echo "Usuario desconocido. <a href='".RUTA_APP."/login.php'>Login</a> 
                                           <a href='".RUTA_APP."/registro.php'>Registro</a>";
			}
		?>
	</div>
</div>
