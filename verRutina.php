<?php

require_once __DIR__ . '/includes/config.php';
$tituloPagina = 'Hypefit | Ver rutina';

$idRutina = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$contenidoPrincipal = mostrarRutina($idRutina);

require __DIR__ . '/includes/comun/layout.php';
