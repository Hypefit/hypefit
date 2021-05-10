<?php
require_once __DIR__.'/includes/config.php';
$tituloPagina= 'Hypefit | Inicio';

$contenidoPrincipal = <<<EOS
        <div class="box">
            RUTINAS DE ENTRENAMIENTO<br>
            Visita nuestra página de <a href="rutinas.php">rutinas</a> y mantente en forma.
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
        <div class="quienesSomos">
            <h4>¿QUIÉNES SOMOS?</h4>
            <p>Hypefit es un innovador gimnasio online que incluye tanto recetas como rutinas equilibradas y pensadas para
            los distintas necesidades de nuestro clientes. <a href="quienesSomos.php">Ver más</a></p>    
        </div>
EOS;

require __DIR__.'/includes/comun/layout.php';