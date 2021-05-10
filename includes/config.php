<?php

use hypefit\Aplicacion;

define('RUTA_APP', '/hypefit');
define('RUTA_IMGS', RUTA_APP.'/img');
define('RUTA_CSS', RUTA_APP.'/css');
define('RUTA_JS', RUTA_APP.'/js');

define('host', 'localhost');
define('user', 'admin');
define('pass', 'adminpass');
define('bd', 'hypefit');

session_start();

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');

spl_autoload_register(function ($class) {
    $prefix = "hypefit";
    $base_dir = __DIR__;
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$datosBD = array();
$datosBD['host'] = host;
$datosBD['user'] = user;
$datosBD['pass'] = pass;
$datosBD['bd'] = bd;
Aplicacion::getSingleton()->init($datosBD);

