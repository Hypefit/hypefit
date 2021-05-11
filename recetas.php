<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesRecetas.php';
$tituloPagina = 'Hypefit | Recetas';

$contenidoPrincipal = "<h1> RECETAS </h1>";
$contenidoPrincipal .= "<h2> ------------------- WITHOUT REQUIREMENTS ------------------- </h2>";
$contenidoPrincipal .= crearListaRecetas("normal");
$contenidoPrincipal .= "<h2> ------------------- VEGETARIAN DIET ------------------- </h2>";
$contenidoPrincipal .= crearListaRecetas("vegetariana");
$contenidoPrincipal .= "<h2> ------------------- VEGAN DIET ------------------- </h2>";
$contenidoPrincipal .= crearListaRecetas("vegana");
$contenidoPrincipal .= "<h3><a href='crearReceta.php'>Crea una nueva receta</a></h3>";
$contenidoPrincipal .= "</div>";

require __DIR__ . '/includes/comun/layout.php';
