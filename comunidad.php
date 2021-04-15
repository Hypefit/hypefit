<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesPosts.php';

$tituloPagina = 'Hypefit | Foro';

$contenidoPrincipal = "<h1> ------------------- FORO ------------------- </h1>";
$contenidoPrincipal .= crearListaPosts();

require __DIR__ . '/includes/comun/layout.php';
