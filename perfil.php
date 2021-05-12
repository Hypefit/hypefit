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
                <div class="text-black">
                    <h1>Tu perfil</h1>
                    <p>Nombre: {$_SESSION["nombre"]}</p>
                    <p>Tu tipo de usuario: {$rol}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
	<h1>Tu perfil</h1>
        <p>Nombre: {$_SESSION["nombre"]}</p>
        <p>Tu tipo de usuario: {$rol}</p>
EOS;
	if (esAdmin()) {
        $form = new AprobarUsuariosForm();
        $contenidoPrincipal .= "<h2>Usuarios sin aprobar</h2>" . $form->gestiona() ;
    }
	else if (!estaAprobado()) {
	    $contenidoPrincipal .= "<p>¡Tu cuenta aún no ha sido aprobada! No podrás crear recetas ni rutinas hasta que tu cuenta sea aprobada por un administrador.</p>";
    }
}
else {
    $contenidoPrincipal = "<p>No has iniciado sesión. Puedes entrar pulsando <a href='login.php'>aquí</a></p>.";
}
require __DIR__.'/includes/comun/layout.php';

