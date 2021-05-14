<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesUsuario.php';
$tituloPagina = 'Hypefit | Ranking';

$contenidoPrincipal  = <<<EOS
<!--Cabecera-->
<div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://estaticos.qdq.com/swdata/home_photos/974/974410946/27a74a23544f44fbb2cf3a3416de476a.jpg);
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
                    <h2 class='mb-3 text-uppercase'>Ranking Hypefit</h2>
                    <h5 class='mb-4'>El top definitivo de los mejores nutricionistas y entrenadores Hypefit</h5>
                </div>
            </div>    
        </div>
    </div>
</div>
<!--Cabecera-->

<!--Contenido-->
<div class='container-fluid p-3 mb-4'>
    <!--Ranking entrenadores-->
    <p id='rankingEntrenadores'></p>
    <div class='container rankingEntrenadores py-5'>
        <div class=' row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-4' >Ranking entrenadores</h2>
        </div>
        <div class='container justify-content-center w-75 pb-2'>
            <div class='row ps-0 '>
                <div class='row'>
                     <div class='col'>
                        <h5>Top</h5>
                    </div>
                    <div class='col'>
                        <h5>Entrenador</h5>
                    </div>
                    <div class='col'>
                        <h5>Valoración</h5>
                    </div>
                </div>
EOS;
$contenidoPrincipal .= topUsuarios("entrenador");

$contenidoPrincipal .= "
            </div>
        </div>
    </div>
";

 $contenidoPrincipal .= " 
    <!--Ranking entrenadores-->
    <p id='rankingNutri'></p>
    <div class='container rankingNutri py-5'>
        <div class=' row ps-0 me-0 align-items-center justify-content-center text-center'>
            <h2 class='text-uppercase pb-4' >Ranking nutricionistas</h2>
        </div>
        <div class='container justify-content-center w-75 pb-2'
            <div class='row ps-0 '>
                <div class='row'>
                     <div class='col'>
                        <h5>Top</h5>
                    </div>
                    <div class='col'>
                        <h5>Nutricionista</h5>
                    </div>
                    <div class='col'>
                        <h5>Valoración</h5>
                    </div>
                </div>";

$contenidoPrincipal .= topUsuarios("nutricionista");

$contenidoPrincipal .= "
            </div>
        </div>
    </div>
</div>";
require __DIR__ . '/includes/comun/layout.php';
