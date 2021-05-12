<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $tituloPagina ?></title>
    <meta http-equiv="Content-Type" content="text/html">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


        <!--ELIMINAR (SOLO PARA EVITAR ELIMINAR CACHE CONTINUAMENTE)-->
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">


    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/estilob.css'?>" />

    <!--Favicon-->
    <link rel="icon"
          type="image/png"
          href="<?= RUTA_IMGS.'/favicon.png'?>">
    <!--Font Awesome (iconos chulos)-->
    <script src="https://kit.fontawesome.com/c4984e3c67.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="contenedor">
        <?php
        require(__DIR__ . '/navBar.php');
        ?>
        <main>
            <article>
                <?= $contenidoPrincipal ?>
            </article>
        </main>
        <?php
        require(__DIR__.'/pie.php');
        ?>
    </div>
    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
            crossorigin="anonymous">
    </script>

</body>
</html>