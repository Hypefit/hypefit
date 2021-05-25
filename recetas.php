<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesRecetas.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';
$tituloPagina = 'Hypefit | Recetas';

//Jumbotron
$contenidoPrincipal = mostrarJumbo("https://elviajerofeliz.com/wp-content/uploads/2020/01/comida-tipica-de-armenia.jpg",
    "Recetas Hypefit", "Deliciosas recetas para acompañar tu entrenamiento y cuidar tu cuerpo");

//Contenido
$contenidoPrincipal  .= <<<EOS
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
            $contenidoPrincipal .= crearListaRecetas("normal");

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
            ";
$contenidoPrincipal .= crearListaRecetas("vegetariana");

$contenidoPrincipal .="
               
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
            ";
$contenidoPrincipal .= crearListaRecetas("vegana");

$contenidoPrincipal .="
                
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
                <h5 class='mb-3 text-uppercase'>Crea una nueva receta</h5>
                    <div class='card-body'>
                        <a href='crearReceta.php' class='btn btn-primary m-3 p-3 text-uppercase'>Crear</a>
                    </div>
                </div>
            </div>
        </div>        
    </div>
        
    <div class='d-flex justify-content-center align-items-center mb-5'>
        <div class='text-center border rounded shadow p-3 rankingNutri'>
            <h5 class='my-3 text-uppercase'>Pulsa para ver cuáles son los nutricionistas Hypefit mejor valorados</h5>
            <a href='ranking.php#rankingNutri' class='btn btn-outline-success m-3 p-3 text-uppercase'>Ranking</a>
        </div>
    </div>
        ";

require __DIR__ . '/includes/comun/layout.php';
