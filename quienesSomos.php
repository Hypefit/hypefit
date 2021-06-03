<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';


$tituloPagina = 'Hypefit | Quiénes somos';


$titulo="<h2 class='mb-3 text-uppercase'>Quiénes somos</h2>";
$subtitulo= <<<EOS
            <p>Cada día, más y más gente se preocupa por su salud y forma física. 
            Sin embargo, no todas las personas tienen la posibilidad de contratar los servicios de un entrenador personal que le indique cuál es el entrenamiento ideal para ellos, y optan por seguir rutinas publicadas en Internet por gente que no tiene conocimientos suficientes, lo cual puede resultar frustrante o incluso peligroso. 
            Con Hypefit esto ya no será un problema.
            <br /><br />
            En Hypefit, los usuarios podrán apuntarse a los entrenamientos creados por titulados en Ciencias de la Actividad Física y el Deporte, ayudándoles a cumplir sus objetivos. 
            Además, uno de nuestros mayores baluartes es la comunidad, ofreciendo a nuestros usuarios la posibilidad de comentar sus progresos para apoyarse recíprocamente. 
            También existirá una sección donde podrán compartir sus consejos, recetas o productos recomendados, para enriquecer la experiencia entre todos.
            </p>";
EOS;
$contenidoPrincipal = customizableJumbo("https://mediaviplar.ximo.pt//CONTEUDOS/39.jpg?h=af390794e6465cc4520c47a2bbfb38e0",
    $titulo, $subtitulo, "", "","","mask-dark text-light");

require __DIR__ . '/includes/comun/layout.php';