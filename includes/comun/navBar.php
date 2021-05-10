<?php
require_once __DIR__.'/../funcionesUsuario.php';
require_once __DIR__.'/../config.php';
?>

<nav class="navbar navbar-expand-md" style="background-color: #cddde8;">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=RUTA_APP.'/index.php'?>">
            <img src="<?=RUTA_IMGS.'/logo.png'?>" alt="Inicio"
            class="d-inline-block align-top">
        </a>
        <button
            class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu"
            aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon" ></span>
        </button>
        <div class="collapse navbar-collapse" id="toggleMobileMenu">
            <ul class="navbar-nav text-center">
                <!--<li class="logo">
                  <a href="<?=RUTA_APP.'/index.php'?>" title="Inicio">
                      <img class="logo" src="<?=RUTA_IMGS.'/logo.png'?>" alt="Inicio">
                  </a>
                </li>-->

                <li class="nav-item"><a class="nav-link" href="<?=RUTA_APP.'/index.php'?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=RUTA_APP.'/rutinas.php'?>">Rutinas</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=RUTA_APP.'/recetas.php'?>">Recetas</a></li>
                <li class="nav-item"><a class="nav-link" href="<?=RUTA_APP.'/comunidad.php'?>">Comunidad</a></li>
                <?php echo saludo(); ?>
            </ul>
        </div>
    </div>
</nav>
