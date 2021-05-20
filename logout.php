<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/autorizacion.php';
require_once __DIR__.'/includes/funcionesUsuario.php';
require_once __DIR__.'/includes/comun/jumbotron.php';


$tituloPagina= 'Hypefit | Logout';

if (estaLogado()) {
    $contenidoPrincipal = mostrarJumbo("https://frasesdelavida.com/wp-content/uploads/2017/11/Frases-de-despedida.jpg",
    "Desconexión", "Hasta otra, {$_SESSION["nombre"]}");
    logout();
} else {
    $contenidoPrincipal = mostrarJumboBoton("https://www.aurigasv.es/img/error-code.jpeg",
        "No has iniciado sesión", "Puedes hacerlo aquí", "login.php",
        "Login");
}

require __DIR__.'/includes/comun/layout.php';
