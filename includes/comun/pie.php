<?php
require_once __DIR__.'/../funcionesUsuario.php';
require_once __DIR__.'/../config.php';
?>

<footer class="text-center text-lg-start" style="background-color: rgb(54,144,213,0.2);">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">ENLACES DE INTERÉS</h5>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">INICIO</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="<?=RUTA_APP.'/index.php'?>" class="nav-link">Inicio</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">RUTINAS</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?=RUTA_APP.'/rutinas.php'?>" class="nav-link">Rutinas</a>
                        </li>
                        <li>
                            <a href="#fullBody" class="nav-link">Full Body</a>
                        </li>
                        <li>
                            <a href="#trenSup" class="nav-link">Tren Superior</a>
                        </li>
                        <li>
                            <a href="#trenInf" class="nav-link">Tren Inferior</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">RECETAS</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?=RUTA_APP.'/recetas.php'?>" class="nav-link">Recetas</a>
                        </li>
                        <li>
                            <a href="#!" class="nav-link">Sin requerimientos</a>
                        </li>
                        <li>
                            <a href="#!" class="nav-link">Vegetariana</a>
                        </li>
                        <li>
                            <a href="#!" class="nav-link">Vegana</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">COMUNIDAD</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?=RUTA_APP.'/comunidad.php'?>" class="nav-link">Comunidad</a>
                        </li>
                        <li>
                            <a href="#!" class="nav-link">Foro recetas</a>
                        </li>
                        <li>
                            <a href="#!" class="nav-link">Foro rutinas</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">QUIÉNES SOMOS</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?=RUTA_APP.'/quienesSomos.php'?>" class="nav-link">Quiénes somos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
  <div class="text-center p-3">

    © 2021 Copyright:
    <a class="text-dark text-center" href="<?=RUTA_APP.'/index.php'?>">Hypefit</a>
  </div>
</footer>
