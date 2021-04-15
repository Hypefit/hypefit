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
}
else {
    $contenidoPrincipal = "No has iniciado sesión. Puedes entrar pulsando <a href='login.php'>aquí</a>";
}
require __DIR__.'/includes/comun/layout.php';

