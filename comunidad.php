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
    <div class='bg-light container-fluid justify-content-center py-3'>
        <div class='py-2 mx-5'>
            <div class='text-uppercase pb-2'>
                <h2>Posts Comunidad</h2>
            </div>
            <!--Rows posts-->
            <div class='row align-items-center'>
                <!--Posts-->
    EOS;
                $contenidoPrincipal .= crearListaPosts();

                $contenidoPrincipal .= <<<EOS
                 <!--/Posts-->
            </div>
            <!--/Rows posts-->
        </div>
    </div>
    <!--Jumbotron-->
    EOS;
        $contenidoPrincipal .= mostrarJumboBoton("https://i1.wp.com/www.julianmarquina.es/wp-content/uploads/Libro-Literatura-Pixabay.jpg",
        "Crea una entrada en el foro", "", "crearPost.php", "Crear");

        $contenidoPrincipal .=
        "<!--/Jumbotron-->";


require __DIR__ . '/includes/comun/layout.php';
