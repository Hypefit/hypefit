<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';
require_once __DIR__.'/includes/funcionesUsuario.php';

$tituloPagina= 'Hypefit | Logout';

if (estaLogado()) {
    $contenidoPrincipal = <<<EOS
<div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://frasesdelavida.com/wp-content/uploads/2017/11/Frases-de-despedida.jpg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
        <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;padding-top:5%; padding-bottom: 5%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                    <h1>DESCONEXIÓN</h1>			
                    <p>Hasta otra, {$_SESSION["nombre"]}</p>
                </div>
            </div>
        </div>
</div>
EOS;
    logout();
} else {
    $contenidoPrincipal = <<<EOS

<div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://frasesdelavida.com/wp-content/uploads/2017/11/Frases-de-despedida.jpg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
        <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;padding-top:5%; padding-bottom: 5%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                    <h1>DESCONEXIÓN</h1>
                    <p>No has iniciado sesión. Puedes hacer Login pulsando <a href="login.php">aquí</a> .</p>
                </div>
            </div>
        </div>
</div>
EOS;
}

require __DIR__.'/includes/comun/layout.php';
