<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<!--<link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/estilo.css'?>" />-->
	<title><?= $tituloPagina ?></title>
    <link rel="icon"
          type="image/png"
          href="<?= RUTA_IMGS.'/favicon.png'?>">
</head>
<body>
<div id="contenedor">
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
</div>
</body>
</html>