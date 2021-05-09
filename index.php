<?php
require_once __DIR__.'/includes/config.php';
$tituloPagina= 'Hypefit | Inicio';

$contenidoPrincipal = <<<EOS
        <div class="contenedor">
            <img src="img/inicio.jpg" />
            <div class="centrado">Bienvenido a HYPEFIT</div>
        </div>
        
        <h2>
            RUTINAS DE ENTRENAMIENTO<br>
            Visita nuestra página de <a href="rutinas.php">rutinas</a> y mantente en forma.
        </h2>
        <h2>
            RECETAS <br>
            Un buen calendario de entrenamientos no sirve de nada sin una buena alimentación.
            Nuestras <a href="recetas.php">recetas</a> preparadas por nutricionistas te ayudarán a conseguir 
            tus objetivos.
        </h2>
        <h4> CALENDARIO ACTIVIDADES
        <img src="img/calendario-abril-2021.jpg" alt="Imagen calendario provisional"></h4>
        <h4>¿QUIÉNES SOMOS?</h4>
        <p>Hypefit es un innovador gimnasio online que incluye tanto recetas como rutinas equilibradas y pensadas para
        los distintas necesidades de nuestro clientes. <a href="quienesSomos.php">Ver más</a></p>    

EOS;

require __DIR__.'/includes/comun/layout.php';