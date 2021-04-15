<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesRutinas.php';
$tituloPagina = 'Hypefit | Rutinas';

$contenidoPrincipal = "<h1> RUTINAS </h1>";
$contenidoPrincipal .= "<h2> ------------------- TREN SUPERIOR ------------------- </h2>";
$contenidoPrincipal .= crearListaRutinas("superior");
$contenidoPrincipal .= "<h2> ------------------- TREN INFERIOR ------------------- </h2>";
$contenidoPrincipal .= crearListaRutinas("inferior");
$contenidoPrincipal .= "<h2> --------------------- FULL BODY --------------------- </h2>";
$contenidoPrincipal .= crearListaRutinas("full body");
$contenidoPrincipal .= "<h3><a href='crearRutina.php'>Crea una nueva rutina</a></h3>";
$contenidoPrincipal .= "</div>";

require __DIR__ . '/includes/comun/layout.php';