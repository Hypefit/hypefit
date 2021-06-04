<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesRutinas.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';

$tituloPagina = 'Hypefit | Rutinas';

$rutaImg = RUTA_IMGS.'/header-rutinas.jpeg';

//Jumbotron
$contenidoPrincipal = mostrarJumbo("https://media.quincemil.com/imagenes/2020/11/09164849/shutterstock_1060003700-1706x960.jpg",
"Rutinas Hypefit", "Para ganar volumen, definir o simplemente mantenerte en forma o iniciarte en el gimnasio");

//Contenido
$contenidoPrincipal  .= <<<EOS
<!--Contenido-->
<div class='bg-light container-fluid px-3' id='trenSuperior'>
    <!--Rows tren superior-->
    <div class='container py-5 '>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' id='trenSup'>Tren superior</h2>
        </div>
        <div class='row ps-0 justify-content-center'>
            <!--Cards tren superior-->
EOS;
                $contenidoPrincipal .= crearListaRutinas("superior");

            $contenidoPrincipal .="
             <!--Cards tren superior-->
        </div>
    </div>    
    <!--Rows tren superior-->
    
    <!--Rows tren inferior-->
    <div class='container pb-5' id='trenInferior'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' id='trenInf'>Tren inferior</h2>
        </div>
        <div class='row ps-0 justify-content-center'>
            <!--Cards tren inferior-->
            ";
            $contenidoPrincipal .= crearListaRutinas("inferior");

            $contenidoPrincipal .="
                
             <!--Cards tren inferior-->
        </div>
    </div>
    <!--Rows tren inferior-->
    
    <!--Rows full body-->
    <div class='container pb-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' id='fullBody'>Full body</h2>
        </div>
        <div class='row ps-0 justify-content-center'>
            <!--Cards full body-->
            ";
                $contenidoPrincipal .= crearListaRutinas("full body");

            $contenidoPrincipal .="
             <!--Cards full body-->
        </div>
    </div>
    <!--Rows full body-->
    ";
            $jumboImg = "https://media.quincemil.com/imagenes/2020/11/09164849/shutterstock_1060003700-1706x960.jpg";
            $jumboTitulo = "Crea una nueva rutina";
            $jumboSubtitulo = "";
            $jumboHref = "crearRutina.php";
            $jumboTextoBoton = "Crear";
            $contenidoPrincipal .= mostrarJumboBoton($jumboImg, $jumboTitulo, $jumboSubtitulo, $jumboHref,$jumboTextoBoton);

            $contenidoPrincipal .= "

    <div class='d-flex justify-content-center align-items-center mb-5'>
        <div class='text-center border rounded shadow p-3 rankingEntrenadores'>
            <h5 class='my-3 text-uppercase'>Pulsa para ver cuáles son los entrenadores Hypefit mejor valorados</h5>
            <a href='ranking.php#rankingEntrenadores' class='btn btn-outline-danger m-3 p-3 text-uppercase'>Ranking</a>
        </div>
    </div>  
";


require __DIR__ . '/includes/comun/layout.php';

