<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $tituloPagina ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


        <!--ELIMINAR (SOLO PARA EVITAR ELIMINAR CACHE CONTINUAMENTE)-->
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">


	<link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/estilo.css'?>" />
    <link rel="icon"
          type="image/png"
          href="<?= RUTA_IMGS.'/favicon.png'?>">
</head>
<body>
<header id="contenedor">
    <?php
    require(__DIR__.'/cabecera.php');
    #require(__DIR__.'/sidebarIzq.php');
    ?>
    <main>
        <article>
            <?= $contenidoPrincipal ?>
        </article>
    </main>
    <?php

    #require(__DIR__.'/sidebarDer.php');
    require(__DIR__.'/pie.php');
    ?>
</header>
</body>
</html>