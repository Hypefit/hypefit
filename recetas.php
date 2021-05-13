<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesRecetas.php';
$tituloPagina = 'Hypefit | Recetas';

$contenidoPrincipal = "<h2> ------------------- DIETA VEGETARIANA ------------------- </h2>";
$contenidoPrincipal .= crearListaRecetas("vegetariana");
$contenidoPrincipal .= "<h2> ------------------- DIETA VEGANA ------------------- </h2>";
$contenidoPrincipal .= crearListaRecetas("vegana");
$contenidoPrincipal .= "<h3><a href='crearReceta.php'>Crea una nueva receta</a></h3>";
$contenidoPrincipal .= "</div>";

$rutaImg = RUTA_IMGS.'/header-rutinas.jpeg';

$contenidoPrincipal  = <<<EOS
<!--Cabecera-->
<div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://elviajerofeliz.com/wp-content/uploads/2020/01/comida-tipica-de-armenia.jpg);
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
                    <h2 class='mb-3 text-uppercase'>Recetas Hypefit</h2>
                    <h5 class='mb-4'>Deliciosas recetas para acompañar tu entrenamiento y cuidar tu cuerpo</h5>
                </div>
            </div>    
        </div>
    </div>
</div>
<!--Cabecera-->

<!--Contenido-->
<div class='bg-light container-fluid px-3'>
    <!--Rows sin requerimientos-->
    <p id='sinRequerimientos'></p>
    <div class='container py-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' >Dieta sin requerimientos</h2>
        </div>
        <div class='row ps-0 justify-content-center'>
            <!--Cards sin requerimientos-->
EOS;
            $contenidoPrincipal .= crearListaRecetas("sin requerimientos");

            $contenidoPrincipal .="
             <!--Cards sin requerimientos-->
             <p id='vegetariana'></p>
        </div>
    </div>    
    <!--Rows sin requerimientos-->
    
    <!--Rows vegetariana-->
    
    <div class='container pb-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' >Dieta vegetariana</h2>
        </div>
        
        <div class='row ps-0 justify-content-center'>
            <!--Cards vegetariana-->
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary ms-2 text-center'> ";
$contenidoPrincipal .= crearListaRecetas("vegetariana");

$contenidoPrincipal .="
                </div>
            </div>
             <!--Cards vegetariana-->
             <p id='vegana'></p>
        </div>
    </div>
    <!--Rows vegetariana-->
    
    <!--Rows vegana-->
    
    <div class='container pb-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3'>Dieta vegana</h2>
        </div>
        <div class='row ps-0 justify-content-center'>
            <!--Cards vegana-->
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary ms-2 text-center'> ";
$contenidoPrincipal .= crearListaRecetas("vegana");

$contenidoPrincipal .="
                </div>
            </div>
             <!--Cards vegana-->
        </div>
    </div>
    <!--Rows vegana-->
    
    <div class='p-5 text-center bg-image img-fluid'
        style='
            background-image: url(https://elviajerofeliz.com/wp-content/uploads/2020/01/comida-tipica-de-armenia.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        '>
    <div class='mask' style='background-color: rgba(255, 255, 255, 0.7); margin: 10%; padding: 5%'>
            <div class='d-flex justify-content-center align-items-center h-100'>
                <div class='text-black'>
                <h5 class='mb-3 text-uppercase'>Crea una entrada en el foro</h5>
                    <div class='card-body'>
                        <a href='crearReceta.php' class='btn btn-primary  p-5 '> CREAR </a>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    ";

require __DIR__ . '/includes/comun/layout.php';
