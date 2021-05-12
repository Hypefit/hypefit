<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesPosts.php';

$tituloPagina = 'Hypefit | Foro';
$rutaImg = RUTA_IMGS.'/header-rutinas.jpeg';
$rutaImg2 = RUTA_IMGS.'/pressbanca.jpg';
$contenidoPrincipal = "<h1> ------------------- FORO ------------------- </h1>";
$contenidoPrincipal .= crearListaPosts();
$contenidoPrincipal .= "<h3><a href='crearPost.php'>Crea una entrada</a> en el foro</h3>";
$contenidoPrincipal  = "
<!--Cabecera-->
<div class='p-5 text-center bg-image'
    style='
        background-image: url(${rutaImg});
        background-size: cover;
        margin-top: 50px;
'>
    <div class='mask-rutinas d-flex justify-content-center align-items-center'>
        <div>
            <h2 class='mb-3 text-uppercase'>Comunidad Hypefit</h2>
            <h5 class='mb-4'>Comparte con otros deportistas apasionados en nuestro foro</h5>
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
        ";
            $contenidoPrincipal .= crearListaPosts();

        $contenidoPrincipal .="
            
    
         <!--Posts-->
    </div>
</div>    
<!--Rows posts-->


    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-12'
    <div class='card h-100 border-secondary ms-2 text-center'
    style='
        background-image: url(${rutaImg2});
        background-size: cover;
        margin-top: 50px;
    '>
        
        <h5 class='card-header text-white'>Crea una entrada en el foro</h5>
        <div class='card-body'>
            <a href='crearPost.php' class='btn btn-primary'>Crea</a>
        </div>        
    </div>
</div>
    ";
require __DIR__ . '/includes/comun/layout.php';
