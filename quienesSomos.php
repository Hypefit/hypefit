<?php
require_once __DIR__ . '/includes/config.php';

$tituloPagina = 'Hypefit | Quiénes somos';

$contenidoPrincipal = '
<div class="p-4 text-center bg-image img-fluid" 
    style="background-image: url(https://www.azapateria.com/wp-content/uploads/2019/07/Web-en-construccion.jpg);
        opacity: 0.9;
        background-repeat: no-repeat;
        background-size: cover;
        width:  auto;
        height: 100%;
        margin: 5%;
    ">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6); margin: 10%; padding: 15%">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-light">
                <h1> Quiénes somos </h1>
                <p>En construcción...</p>
            </div>  
        </div>
    </div>
</div>   
';

require __DIR__ . '/includes/comun/layout.php';