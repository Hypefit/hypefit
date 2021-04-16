<?php  
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';
require_once __DIR__.'/includes/funcionesUsuario.php';

$tituloPagina= 'Hypefit | Perfil';
$contenidoPrincipal='';

if(estaLogado())
{
	$contenidoPrincipal = <<<EOS
	<h1>Tu Perfil</h1>
        <p>Nombre: {$_SESSION["nombre"]}</p>
        <p>Tu tipo de usuario: {$_SESSION["rol"]}</p>
EOS;
	if (esAdmin()) {
        $contenidoPrincipal .= mostrarUsuariosSinAprobar();
    }
	else if (!estaAprobado()) {
	    $contenidoPrincipal .= "<p>¡Tu cuenta aún no ha sido aprobada! No podrás crear recetas ni rutinas hasta que tu cuenta sea aprobada por un administrador.</p>";
    }
}
else {
    $contenidoPrincipal = "<p>No has iniciado sesión. Puedes entrar pulsando <a href='login.php'>aquí</a></p>.";
}
require __DIR__.'/includes/comun/layout.php';

