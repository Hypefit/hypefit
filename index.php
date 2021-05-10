<?php
require_once __DIR__.'/includes/config.php';
$tituloPagina= 'Hypefit | Inicio';

require(__DIR__.'/includes/comun/cabecera.php');

$contenidoPrincipal = <<<EOS
    <div class="bg-light" id="inicio" style="height: 10%;"></div>
    <div class="box bg-light rounded row align-items-center justify-content-center" style="
        width:  auto;
        height: 90%;
    ">
        <div  class="center-block row align-items-center" style="
        width:  85%;
        height: 80%;
        background-color: #CDDDE8FF;
        color: rgba(0,0,0,0.64);
        ">
            <h2 class="text-uppercase text-lg-center font-weight-bold">Rutinas de entrenamiento</h2>
            <div class="text-center">
                <h5>Mantente en forma con nuestras <a class="text-black" href="rutinas.php">rutinas</a>.</h5>
                <h5>Disponemos de un amplio catálogo de rutinas divididas en grupos musculares.</h5>
            </div>
        </div>
    </div>
    <div class="box">
        RECETAS <br>
        Un buen calendario de entrenamientos no sirve de nada sin una buena alimentación.
        Nuestras <a href="recetas.php">recetas</a> preparadas por nutricionistas te ayudarán a conseguir 
        tus objetivos.
    </div>
    <div class="calendario">
        <h4> CALENDARIO ACTIVIDADES</h4>
        <img src="img/calendario-abril-2021.jpg" alt="Imagen calendario provisional">
    </div>
    <!--<div class="quienesSomos">
        <h4>¿QUIÉNES SOMOS?</h4>
        <p>Hypefit es un innovador gimnasio online que incluye tanto recetas como rutinas equilibradas y pensadas para
        los distintas necesidades de nuestro clientes. <a href="quienesSomos.php">Ver más</a></p>    
    </div>-->
EOS;

require __DIR__.'/includes/comun/layout.php';