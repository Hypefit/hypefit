<?php

use hypefit\Forms\AprobarUsuariosForm;

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';
require_once __DIR__.'/includes/funcionesUsuario.php';

$tituloPagina= 'Hypefit | Perfil';
$contenidoPrincipal='';

if(estaLogado())
{
    $rol = ucwords($_SESSION["rol"]);
    if(esAdmin()){
        $contenidoPrincipal = <<<EOS
    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://www.vikika.es/blog/wp-content/uploads/2019/09/sindrome-oficinista-1.jpg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">

EOS;
    }
    else if(esEntrenador()) {
        $contenidoPrincipal = <<<EOS
    <!-- Jumbotron -->
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

EOS;
    }
    else if(esNutricionista()) {
        $contenidoPrincipal = <<<EOS
    <!-- Jumbotron -->
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

EOS;
    }
    else {
        $contenidoPrincipal = <<<EOS
    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
EOS;
    }
    $mensajeNoAprobado = estaAprobado() ? '' : "<p>¡Tu cuenta aún no ha sido aprobada! No podrás crear recetas ni rutinas hasta que tu cuenta sea aprobada por un administrador.</p>";
    $contenidoPrincipal .= <<<EOS

        <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-black">
                    <h1>Tu perfil</h1>
                    <p>Nombre: {$_SESSION["nombre"]}</p>
                    <p>Tu tipo de usuario: {$rol}</p>
                    {$mensajeNoAprobado}
                </div>
            </div>
        </div>
    </div>
EOS;

	if (esAdmin()) {
        $form = new AprobarUsuariosForm();
        $contenidoPrincipal .= <<<EOS
        <div class="p-5 text-center"
        style="
            background-color: #d7e9f7;
            opacity: 0.9;
            margin: 5%;
        ">
            <h2 class="pb-2 mb-3">Usuarios sin aprobar</h2>
EOS;
        $contenidoPrincipal .= $form->gestiona() ;
    }
}
else {
    $contenidoPrincipal = <<<EOS
    <!-- Jumbotron -->
    <div class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url(https://s1.1zoom.me/b5249/490/Closeup_15_kg_Barbell_514746_1366x768.jpg);
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            width:  auto;
            height: 100%;
            margin: 5%;
        ">
        <div class="mask" style="background-color: rgba(255, 255, 255, 0.7); margin: 10%;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <p>No has iniciado sesión. Puedes entrar pulsando <a href='login.php'>aquí</a></p>
            </div>
        </div>
       </div>
EOS;
}
require __DIR__.'/includes/comun/layout.php';

