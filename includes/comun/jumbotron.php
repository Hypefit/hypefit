<?php

function cabeceraInicio($img, $titulo, $subtitulo, $boton, $href)
{
    $html = <<<EOS
    <div class="jumbotron jumbotron-inicio p-5 text-center bg-image img-fluid"
        style="background-image: url({$img}); ">
        <div class="row justify-content-center">
            <div class ="mask-dark col-xs-12 col-sm-10 col-md-9">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-light">
                        <h1 class="mb-3">{$titulo}</h1>
                        <h4 class="mb-4">{$subtitulo}</h4>
                        <a class="btn btn-outline-light btn-lg" href={$href} role="button">
                            {$boton}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
EOS;
    return $html;
}

function mostrarJumbo($jumboImg, $tituloJumbo, $subtituloJumbo)
{
    $html = <<<EOS
    <div class="jumbotron p-5 text-center bg-image img-fluid"
         style="background-image: url({$jumboImg});">
        <div class="row justify-content-center align-items-center">
            <div class="mask-light col-xs-12 col-sm-10 col-md-9">
                <h2 class='mb-3 text-uppercase'>{$tituloJumbo}</h2>
                <h5 class='mb-4'>{$subtituloJumbo}</h5>
            </div>
        </div>
    </div>
EOS;
    return $html;
}

function mostrarJumboBoton($jumboBImg, $tituloBJumbo, $subtituloBJumbo, $hrefJumbo, $buttonTextJumbo){
    $html = <<<EOS
    
    <div class="jumbotron p-5 text-center bg-image img-fluid"
         style="background-image: url({$jumboBImg});">
        <div class="row justify-content-center align-items-center">
            <div class="mask-light col-xs-12 col-sm-10 col-md-9 ">
                <h2 class='mb-3 text-uppercase'>{$tituloBJumbo}</h2>
                <h5 class='mb-4'>{$subtituloBJumbo}</h5>
                <a href={$hrefJumbo} class='btn btn-primary text-uppercase m-3 p-3 '>{$buttonTextJumbo}</a>
            </div>
        </div>
    </div>
EOS;
    return $html;
}

function formJumbo($jumboImg, $tituloJumbo, $subtituloJumbo, $form){
    $html = <<< EOS
    <div class="jumbotron p-5 text-center bg-image img-fluid"
        style="background-image: url({$jumboImg});">
        <div class="row justify-content-center">
            <div class="mask-light signup-form col-xs-12 col-sm-10 col-md-9 m-2">
                <div class="row justify-content-center">
                    <h2 class="text-dark pt-3">{$tituloJumbo}</h2>
                    <p class="pb-2">{$subtituloJumbo}</p>
                    <hr>
                    {$form}
               </div>  
            </div>  
        </div>  
    </div>
    EOS;
    return $html;
}

function customizableJumbo($jumboImg, $tituloJumbo, $subtituloJumbo, $textoCustom, $buttonCustom, $classJ, $classM){
    $html = <<<EOS
    
    <div class="jumbotron p-5 text-center bg-image img-fluid {$classJ}"
         style="background-image: url({$jumboImg});">
        <div class="row justify-content-center align-items-center">
            <div class="mask-light col-9 {$classM}">
                {$tituloJumbo}
                {$subtituloJumbo}
                {$textoCustom}
                {$buttonCustom}
            </div>
        </div>
    </div>
EOS;
    return $html;
}