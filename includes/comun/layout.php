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
    <link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/bootstrap.css'?>" />

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="<?= RUTA_CSS.'/estilo.css'?>" />


        <!--jQuery-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
        <script src="<?= RUTA_JS.'/jquery-3.6.0.min.js'?>"></script>

    <!--Favicon-->
    <link rel="icon"
          type="image/png"
          href="<?= RUTA_IMGS.'/favicon.png'?>"/>

    <!--Font Awesome (iconos chulos)-->
    <script src="https://kit.fontawesome.com/c4984e3c67.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="contenedor">
        <?php
        include(__DIR__ . '/navBar.php');
        ?>
        <main class="mt-5">
            <article>
                <?= $contenidoPrincipal ?>
            </article>
        </main>
        <?php
        include(__DIR__.'/pie.php');
        ?>
    </div>

    <!--Bootstrap-->
    <script src="<?= RUTA_JS.'/bootstrap.js'?>"></script>

    <!--JS-->
    <script src="<?= RUTA_JS.'/validationRegistro.js'?>"></script>
    <script src="<?= RUTA_JS.'/validationLogin.js'?>"></script>


    <?php
        if(isset($scripts)) {
            foreach ($scripts as $url) {
                echo "<script src=$url></script>";
            }
        }
    ?>
</body>
</html>