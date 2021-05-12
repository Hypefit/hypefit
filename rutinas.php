<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesRutinas.php';
$tituloPagina = 'Hypefit | Rutinas';

$rutaImg = RUTA_IMGS.'/header-rutinas.jpeg';

$contenidoPrincipal  = <<<EOS
<!--Cabecera-->
<div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://media.quincemil.com/imagenes/2020/11/09164849/shutterstock_1060003700-1706x960.jpg);
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
                <h2 class='mb-3 text-uppercase'>Rutinas Hypefit</h2>
                <h5 class='mb-4'>Para ganar volumen, definir o simplemente mantenerte en forma o 
                iniciarte en el gimnasio</h5>
                </div>
            </div>    
        </div>
    </div>
</div>
<!--Cabecera-->

<!--Contenido-->
<div class='bg-light container-fluid px-3' id='trenSuperior'>
    <!--Rows tren superior-->
    <div class='container py-5 '>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-3' id='trenSup'>Tren superior</h2>
        </div>
        <div class='row ps-0 justify-content-center'>
            <!--Cards tren superior-->
            ";
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
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary ms-2 text-center'> ";
                    $contenidoPrincipal .= crearListaRutinas("inferior");

            $contenidoPrincipal .="
                </div>
            </div>
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
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary ms-2 text-center'> ";
                    $contenidoPrincipal .= crearListaRutinas("inferior");

            $contenidoPrincipal .="
                </div>
            </div>
             <!--Cards full body-->
        </div>
    </div>
    <!--Rows full body-->
    
    <div class='container pb-5'>
        <div class='bg-light row ps-0 me-0 align-items-center justify-content-center'>
            <h5><a href='crearRutina.php'>Crea una nueva rutina</a></h5>
        </div>
    </div>
    ";


require __DIR__ . '/includes/comun/layout.php';

