<?php


use hypefit\DAO\NoticiasDAO;
use hypefit\DAO\UsuarioDAO;


require_once __DIR__ . '/config.php';
require_once __DIR__ . '/autorizacion.php';

function crearListaNoticias(): string {
    $dao = new NoticiasDAO();
    $lista = $dao->getAllNoticias();
    $html="";

    foreach($lista as $post) {
        $html .= "
            <div class='col-xs-12 col-sm-6 col-md-4 mb-4'>
                <div class='card h-100 border-secondary text-center'>
                    <h5 class='card-header text-capitalize'>" . $post->getTitulo() . "</h5>
                    <div class='card-body align-items-end'>
                        <a  href='verNoticia.php?id=" . $post->getId() . "' class='btn btn-outline-secondary'>Ver Noticia</a>
                    </div>        
                </div>
            </div>
            ";
    }

    return $html;
}

function mostrarNoticia($id) : string {
    $dao = new NoticiasDAO();
    $post = $dao->getNoticia($id);

    if ($post == null) {
        return -1;

    }
    else {
        $html = <<<EOS
        <div class="m-2">
            <div class="m-3 ms-5">
                <h1> {$post->getTitulo()} </h1>
            </div>
        EOS;
        $html .= mostrarTextoNoticia($id);
        return $html;
    }
}

function mostrarTextoNoticia($id) : string {
    $dao = new NoticiasDAO();
    $daoU = new UsuarioDAO();
    $post = $dao->getNoticia($id);
    $html = <<<EOS
    <div class="container-fluid">
        <div class="row ms-3">
            <div class="col-12 col-md-9">
    EOS;

    $user = $daoU->getUsuario($post->getIdAutor());
    $username = $user->getNombre();
    $texto = $post->getTexto();
    $filename = $post->getFilename();
    //$tempname = $post->getTmpFilename();
    $rutaImg = RUTA_IMGS ."/$filename";
    //print_r($_FILES);
        $html .= <<<EOS
                <div class="card mb-4">
                    <div class="card-header">  
                        <p class="mb-0">$username</p>
                    </div>
                    <div class="card-body">
                        <p>$texto</p>
                        <img src="${rutaImg}">
                    </div>
                    
                </div>
        EOS;
    $html .= "
            </div>
        </div>
    </div>
</div>";

    return $html;
}