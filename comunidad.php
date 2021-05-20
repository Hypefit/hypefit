<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesPosts.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';

$tituloPagina = 'Hypefit | Foro';
//$rutaImg = RUTA_IMGS.'/header-rutinas.jpeg';
//$rutaImg2 = RUTA_IMGS.'/pressbanca.jpg';


$contenidoPrincipal = mostrarJumbo("https://blog.grupo-pya.com/wp-content/uploads/2016/07/discussion-forums.jpg",
    "Comunidad Hypefit", "Comparte con otros deportistas apasionados en nuestro foro");

$contenidoPrincipal  .= <<<EOS
<!--Contenido-->
<div class='bg-light container-fluid px-3'>
    <!--Rows posts-->
    <div class='container py-5 '>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' id='posCom'>Posts Comunidad</h2>
        </div>
        <div class='row ps-0 justify-content-center'>
            <!--Posts-->
EOS;
        $contenidoPrincipal .= crearListaPosts();

        $contenidoPrincipal .= <<<EOS
         <!--Posts-->
        </div>
    </div>    
    <!--Rows posts-->

    <!--Jumbotron-->
EOS;

    $contenidoPrincipal .= mostrarJumboBoton("https://i1.wp.com/www.julianmarquina.es/wp-content/uploads/Libro-Literatura-Pixabay.jpg",
        "Crea una entrada en el foro", "", "crearPost.php", "Crear");

    $contenidoPrincipal .=<<<EOS
    <!--Jumbotron-->
</div>";
EOS;

require __DIR__ . '/includes/comun/layout.php';
