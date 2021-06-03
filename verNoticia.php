<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/autorizacion.php';
require_once __DIR__ . '/includes/funcionesNoticias.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';

$tituloPagina = 'Hypefit | Ver noticia';

$idPost = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$aux = mostrarNoticia($idPost);

if($aux == -1){
    header('Location:'.RUTA_APP.'/noticias.php');
}
else {
    $contenidoPrincipal = mostrarJumbo("https://media.istockphoto.com/videos/global-earth-rotating-digital-world-news-studio-background-for-news-video-id973411022?b=1&k=6&m=973411022&s=640x640&h=RBYnDWaml4L38JRNGiKXrewnJKOBX7i2Cjtsknfic5I=",
        "Noticias", "Noticias que pueden ser interesantes para ti");

    $contenidoPrincipal .= $aux;
}
require __DIR__ . '/includes/comun/layout.php';
