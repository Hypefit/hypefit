<?php
require_once __DIR__.'/../funcionesUsuario.php';
require_once __DIR__.'/../config.php';
?>
 <!--
<footer class="text-center text-lg-start">
        <div class="container-fluid">
                <ul class="list-unstyled mb-0">
                    <li><a href="<?=RUTA_APP.'/index.php'?>">Inicio</a></li>
                    <li><a href="<?=RUTA_APP.'/rutinas.php'?>">Rutinas</a></li>
                    <li><a href="<?=RUTA_APP.'/recetas.php'?>">Recetas</a></li>
                    <li><a href="<?=RUTA_APP.'/comunidad.php'?>">Comunidad</a></li>
                    <li><a href="<?=RUTA_APP.'/quienesSomos.php'?>">¿Quiénes somos?</a></li>
                </ul>
        </div>
</footer>      -->

<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">¿Quiénes somos?</h5>
        <p>
            Hypefit es un innovador gimnasio online que incluye tanto recetas como rutinas equilibradas y pensadas
            para los distintas necesidades de nuestro clientes.
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase text-center">Páginas de interés</h5>
        <ul class="list-unstyled mb-0 text-center">
           <li><a class="text-dark" href="<?=RUTA_APP.'/index.php'?>">Inicio</a></li>
           <li><a class="text-dark" href="<?=RUTA_APP.'/rutinas.php'?>">Rutinas</a></li>
           <li><a class="text-dark" href="<?=RUTA_APP.'/recetas.php'?>">Recetas</a></li>
           <li><a class="text-dark" href="<?=RUTA_APP.'/comunidad.php'?>">Comunidad</a></li>
           <li><a class="text-dark" href="<?=RUTA_APP.'/quienesSomos.php'?>">¿Quiénes somos?</a></li>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright:
    <a class="text-dark" href="<?=RUTA_APP.'/index.php'?>">Hypefit</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->