<?php

use hypefit\Aplicacion;

define('__ROOT__', dirname(dirname(__FILE__)));
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
function resolveContentNegotiation(string $acceptRules, array $supported, string $default = null){

    // Accept header is case insensitive, and whitespace isn't important.
    $acceptRules = strtolower(str_replace(' ', '', $acceptRules));

    $sortedAcceptTypes = array();
    foreach (explode(',', $acceptRules) as $acceptRule) {
        $q = 1; // the default accept quality (rating).

        // Check if there is a different quality.
        if (strpos($acceptRule, ';q=') !== false) {
            // Divide "type;q=X" into two parts: "type" and "X"
            list($acceptRule, $q) = explode(';q=', $acceptRule, 2);
        }
        $sortedAcceptTypes[$acceptRule] = $q;
    }
    // WARNING: zero quality is means, that type isn't supported! Thus remove them.
    $sortedAcceptTypes = array_filter($sortedAcceptTypes);
    arsort($sortedAcceptTypes, SORT_NUMERIC);

    // If no parameter was passed, just return parsed data.
    if (!$supported) {
        return $sortedAcceptTypes;
    }

    $supported = array_map('strtolower', $supported);

    // Let's check our supported types.
    foreach ($sortedAcceptTypes as $type => $q) {
        foreach ($supported as $desired) {
            if ($q && fnmatch($desired, $type)) {
                return $type;
            }
        }
    }

    // No matched type.
    return $default;
}
function jTraceEx($e, $seen=null) {
    $starter = $seen ? 'Caused by: ' : '';
    $result = array();
    if (!$seen) $seen = array();
    $trace  = $e->getTrace();
    $prev   = $e->getPrevious();
    $result[] = sprintf('%s%s: %s', $starter, get_class($e), $e->getMessage());
    $file = $e->getFile();
    $line = $e->getLine();
    while (true) {
        $current = "$file:$line";
        if (is_array($seen) && in_array($current, $seen)) {
            $result[] = sprintf(' ... %d more', count($trace)+1);
            break;
        }
        $result[] = sprintf(' at %s%s%s(%s%s%s)',
            count($trace) && array_key_exists('class', $trace[0]) ? str_replace('\\', '.', $trace[0]['class']) : '',
            count($trace) && array_key_exists('class', $trace[0]) && array_key_exists('function', $trace[0]) ? '.' : '',
            count($trace) && array_key_exists('function', $trace[0]) ? str_replace('\\', '.', $trace[0]['function']) : '(main)',
            $line === null ? $file : basename($file),
            $line === null ? '' : ':',
            $line === null ? '' : $line);
        if (is_array($seen))
            $seen[] = "$file:$line";
        if (!count($trace))
            break;
        $file = array_key_exists('file', $trace[0]) ? $trace[0]['file'] : 'Unknown Source';
        $line = array_key_exists('file', $trace[0]) && array_key_exists('line', $trace[0]) && $trace[0]['line'] ? $trace[0]['line'] : null;
        array_shift($trace);
    }
    $result = join("\n", $result);
    if ($prev)
        $result  .= "\n" . jTraceEx($prev, $seen);

    return $result;
}
set_exception_handler(function (\Throwable $e) {
    $statusCode = 500;

    if ($e instanceof es\ucm\fdi\aw\http\ResponseStatusCode) {
        $statusCode = $e->getStatusCode();
    }
    http_response_code($statusCode);

    // La constante DEBUG está definida al comienzo del archivo con el resto de constantes.
    if (DEBUG) {
        echo "<!DOCTYPE html><html><head><title>Error</title></head><body><pre>";
        echo jTraceEx($e);
        echo "</pre></body></html>";
    } else {

        /**
         * Verificamos si el error lo tiene que procesar javascript -> application/json o lo va a ver directamente
         * el usuario final -> text/html
         */
        $mime = resolveContentNegotiation($_SERVER['HTTP_ACCEPT'], array('text/html', 'application/json'), 'text/html');
        switch($mime) {
            case 'application/json':
                $json = json_encode(es\ucm\fdi\aw\http\ErrorResponse::fromException($e), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
                header('Content-Type: application/json; charset=utf-8');
                header('Content-Length: ' . mb_strlen($json));

                echo $json;
                break;
            case 'text/html':
            default:
                // open the file in a binary mode
                $name = dirname(__DIR__).'/500.html';
                $fp = fopen($name, 'rb');

                // send the right headers
                header('Content-Type: text/html; charset=utf-8');
                header('Content-Length: ' . filesize($name));

                // dump the picture and stop the script
                fpassthru($fp);
                break;
        }
    }

    exit;
});

$datosBD = array();
$datosBD['host'] = host;
$datosBD['user'] = user;
$datosBD['pass'] = pass;
$datosBD['bd'] = bd;
Aplicacion::getSingleton()->init($datosBD);

