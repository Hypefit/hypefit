<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesPosts.php';

$tituloPagina = 'Hypefit | Foro';
$rutaImg = RUTA_IMGS.'/header-rutinas.jpeg';
$rutaImg2 = RUTA_IMGS.'/pressbanca.jpg';
$contenidoPrincipal = "<h1> ------------------- FORO ------------------- </h1>";
$contenidoPrincipal .= crearListaPosts();
$contenidoPrincipal .= "<h3><a href='crearPost.php'>Crea una entrada</a> en el foro</h3>";
$contenidoPrincipal  = <<<EOS
<!--Cabecera-->
<div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://blog.grupo-pya.com/wp-content/uploads/2016/07/discussion-forums.jpg);
    opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
    <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%; padding: 5%">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                <h2 class='mb-3 text-uppercase'>Comunidad Hypefit</h2>
                <h5 class='mb-4'>Comparte con otros deportistas apasionados en nuestro foro</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cabecera-->

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


    <div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://i1.wp.com/www.julianmarquina.es/wp-content/uploads/Libro-Literatura-Pixabay.jpg?resize=1024%2C683&ssl=1);
    opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
    <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%; padding: 5%">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                <h5 class='mb-3 text-uppercase'>Crea una entrada en el foro</h5>
                    <div class='card-body'>
                        <a href='crearPost.php' class='btn btn-primary text-uppercase m-3 p-3 '>Crear</a>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
EOS;

require __DIR__ . '/includes/comun/layout.php';
