<?php
require_once __DIR__ . '/includes/config.php';

$tituloPagina = 'Hypefit | Error al iniciar sesión';

$contenidoPrincipal = "<h1> Error al iniciar sesión </h1>";
$contenidoPrincipal .= "<p>Usuario o contraseña incorrecta. Puedes volver a intentarlo <a href='login.php'>aquí</a>.</p>";

require __DIR__ . '/includes/comun/layout.php';