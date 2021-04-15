<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesPosts.php';

$tituloPagina = 'Hypefit | Foro';

$contenidoPrincipal = "<h1> ------------------- FORO ------------------- </h1>";
$contenidoPrincipal .= crearListaPosts();
$contenidoPrincipal .= "<h3><a href='crearPost.php'>Crea una entrada</a> en el foro</h3>";

require __DIR__ . '/includes/comun/layout.php';
