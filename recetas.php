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
            <h2 class='mb-3 text-uppercase'>Recetas Hypefit</h2>
            <h5 class='mb-4'>Deliciosas recetas para acompañar tu entrenamiento y cuidar tu cuerpo</h5>
        </div>
    </div>
</div>
<!--Cabecera-->

<!--Contenido-->
<div class='bg-light container-fluid px-3'>
    <!--Rows sin requerimientos-->
    <div class='container py-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' id='sinRequerimientos'>Dieta sin requerimientos</h2>
        </div>
        <div class='row ps-0 justify-content-center'>
            <!--Cards sin requerimientos-->
            ";
            $contenidoPrincipal .= crearListaRecetas("normal");

            $contenidoPrincipal .="
             <!--Cards sin requerimientos-->
        </div>
    </div>    
    <!--Rows sin requerimientos-->
    
    <!--Rows vegetariana-->
    <div class='container pb-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' id='vegetariana'>Dieta vegetariana</h2>
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
        </div>
    </div>
    <!--Rows vegetariana-->
    
    <!--Rows vegana-->
    <div class='container pb-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' id='vegana'>Dieta vegana</h2>
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
    
    <div class='container pb-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center'>
            <h5><a href='crearReceta.php'>Crea una nueva receta</a></h5>
        </div>
    </div>
    ";

require __DIR__ . '/includes/comun/layout.php';
