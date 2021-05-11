<?php

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/funcionesRecetas.php';

$tituloPagina = 'Hypefit | Ver receta';

$idReceta = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
$contenidoPrincipal = mostrarReceta($idReceta);

require __DIR__ . '/includes/comun/layout.php';