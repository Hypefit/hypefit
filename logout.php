<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';
require_once __DIR__.'/includes/funcionesUsuario.php';

$tituloPagina= 'Hypefit | Logout';

if (estaLogado()) {
    $contenidoPrincipal = <<<EOS
        <h1>Desconexión</h1>			
            <p>Hasta otra, {$_SESSION["nombre"]}</p>
    EOS;
    logout();
} else {
    $contenidoPrincipal = <<<EOS
        <h1>Desconexión</h1>			
            <p>No has iniciado sesión. Puedes entrar pulsando <a href='login.php'>aquí</a>.</p>
    EOS;
}

require __DIR__.'/includes/comun/layout.php';
