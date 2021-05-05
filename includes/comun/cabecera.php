<?php
require_once __DIR__.'/../funcionesUsuario.php';
require_once __DIR__.'/../config.php';

?>

<header>
	<a href="<?=RUTA_APP.'/index.php'?>" title="Inicio">
        <img class="logo" src="<?=RUTA_IMGS.'/logo.png'?>" alt="Inicio">
    </a>
</header>
<nav>
    <ul>
      <li><a href="<?=RUTA_APP.'/index.php'?>">Inicio</a></li>
      <li><a href="<?=RUTA_APP.'/rutinas.php'?>">Rutinas</a></li>
      <li><a href="<?=RUTA_APP.'/recetas.php'?>">Recetas</a></li>
      <li><a href="<?=RUTA_APP.'/comunidad.php'?>">Comunidad</a></li>
    <?php echo saludo(); ?>
    </ul>
</nav>
