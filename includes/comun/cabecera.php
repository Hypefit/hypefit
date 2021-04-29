<?php
require_once __DIR__.'/../funcionesUsuario.php';
require_once __DIR__.'/../config.php';

?>

<header>
    <img class="logo" src="<?=RUTA_IMGS.'/logo.png'?>" alt="Hypefit logo">
	
	<div class="saludo">
		
		<a href="<?=RUTA_APP.'/index.php'?>">Inicio</a>
		<a href="<?=RUTA_APP.'/rutinas.php'?>">Rutinas</a>
		<a href="<?=RUTA_APP.'/recetas.php'?>">Recetas</a>
		<a href="<?=RUTA_APP.'/comunidad.php'?>">Comunidad</a>
			
		<?php
			echo saludo();
		?>
	</div>
</header>