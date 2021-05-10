<?php
require_once __DIR__.'/../funcionesUsuario.php';
require_once __DIR__.'/../config.php';
?>


    <footer class="bg-light text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">ENLACES DE INTERÉS</h5>

                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">INICIO</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="<?=RUTA_APP.'/index.php'?>" class="text-dark">Inicio</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">RUTINAS</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?=RUTA_APP.'/rutinas.php'?>" class="text-dark">Rutinas</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Full Body</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Tren Superior</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Tren Inferior</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">RECETAS</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?=RUTA_APP.'/recetas.php'?>" class="text-dark">Recetas</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Completa</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Vegetariana</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Vegana</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">COMUNIDAD</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?=RUTA_APP.'/comunidad.php'?>" class="text-dark">Comunidad</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Foro recetas</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Foro rutinas</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">QUIÉNES SOMOS</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?=RUTA_APP.'/quienesSomos.php'?>" class="text-dark">Quiénes somos</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">

    © 2021 Copyright:
    <a class="text-dark text-center" href="<?=RUTA_APP.'/index.php'?>">Hypefit</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->