<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/comun/jumbotron.php';


$tituloPagina = 'Hypefit | Quiénes somos';


$titulo="<h2 class='mb-3 text-uppercase'>Quiénes somos</h2>";
$subtitulo="<h5 class='mb-4'>En construccion...</h5>";

$contenidoPrincipal = customizableJumbo("https://www.azapateria.com/wp-content/uploads/2019/07/Web-en-construccion.jpg,",
    $titulo, $subtitulo, "", "","","mask-dark text-light");

require __DIR__ . '/includes/comun/layout.php';