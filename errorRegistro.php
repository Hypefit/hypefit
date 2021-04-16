<?php
require_once __DIR__ . '/includes/config.php';

$tituloPagina = 'Hypefit | Error al registrarse';

$contenidoPrincipal = "<h1> Error al registrarse </h1>";
$contenidoPrincipal .= "<p>El email introducido ya existe. Puedes volver a intentar registrarte <a href='login.php'>aquí</a>.</p>";

require __DIR__ . '/includes/comun/layout.php';