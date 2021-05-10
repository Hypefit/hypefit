<?php
require_once __DIR__.'/../config.php';
?>

<!--<header>
    <img class="cabecera" src="<?=RUTA_IMGS.'/cabecera.jpg'?>" alt="Imagen cabecera">
    <div class="contenedor">
        <div class="centrado">Bienvenido a HYPEFIT</div>
    </div>
</header>
-->
    <!-- Jumbotron -->
    <div
        class="p-5 text-center bg-image img-fluid"
        style="
            background-image: url('<?=RUTA_IMGS.'/cabecera2.jpg'?>');
            opacity: 0.9;
            background-repeat: no-repeat;
            background-size: cover;
            margin-top: 50px;
            width:  auto;
            height: 90%;
        ">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3">Bienvenido a HYPEFIT</h1>
                    <h4 class="mb-4">Todo lo que necesitas a un solo click</h4>
                    <a class="btn btn-outline-light btn-lg" href="#inicio" role="button">
                        Empezar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</header>

