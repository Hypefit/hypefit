<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesNoticias.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';

$tituloPagina = 'Hypefit | Noticias';

$contenidoPrincipal = mostrarJumbo("https://media.istockphoto.com/videos/global-earth-rotating-digital-world-news-studio-background-for-news-video-id973411022?b=1&k=6&m=973411022&s=640x640&h=RBYnDWaml4L38JRNGiKXrewnJKOBX7i2Cjtsknfic5I=",
    "Noticias actuales", "Noticias del mundo de deporte y salud");

$contenidoPrincipal  .= <<<EOS
    <!--Contenido-->
    <div class='bg-light container-fluid justify-content-center py-3'>
        <div class='py-2 mx-5'>
            <div class='text-uppercase pb-2'>
                <h2>Noticias</h2>
            </div>
            <!--Rows posts-->
            <div class='row align-items-center'>
                <!--Posts-->
    EOS;
                $contenidoPrincipal .= crearListaNoticias();

                $contenidoPrincipal .= <<<EOS
                 <!--/Posts-->
            </div>
            <!--/Rows posts-->
        </div>
    </div>
    <!--Jumbotron-->
    EOS;
        $contenidoPrincipal .= mostrarJumboBoton("https://i1.wp.com/www.julianmarquina.es/wp-content/uploads/Libro-Literatura-Pixabay.jpg",
        "Escribir una nueva noticia", "", "crearNoticia.php", "Crear");

        $contenidoPrincipal .=
        "<!--/Jumbotron-->";


require __DIR__ . '/includes/comun/layout.php';