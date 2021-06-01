<?php

use hypefit\DAO\ComentarioDAO;
use hypefit\DAO\PostsDAO;
use hypefit\DAO\UsuarioDAO;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/autorizacion.php';

function crearListaPosts(): string {
    $dao = new PostsDAO();
    $lista = $dao->getAllPosts();
    $html="";

    foreach($lista as $post) {
        $html .= "
            <div class='col-xs-12 col-sm-6 col-md-4 mb-4'>
                <div class='card h-100 border-secondary text-center'>
                    <h5 class='card-header text-capitalize'>" . $post->getTitulo() . "</h5>
                    <div class='card-body align-items-end'>
                        <a  href='verPost.php?id=" . $post->getId() . "' class='btn btn-outline-secondary'>Ver Post</a>
                    </div>        
                </div>
            </div>
            ";
    }

    return $html;
}

function mostrarPost($id) : string {
    $dao = new PostsDAO();
    $post = $dao->getPost($id);

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
        $html .= mostrarComentariosPost($id);
        return $html;
    }
}

function mostrarComentariosPost($id) : string {
    $daoC = new ComentarioDAO();
    $daoU = new UsuarioDAO();

    $comentarios = $daoC->getComentariosDelPost($id);
    $html = <<<EOS
    <div class="container-fluid">
        <div class="row ms-3">
            <div class="col-12 col-md-9">
    EOS;

    foreach($comentarios as $comentario) {
        $user = $daoU->getUsuario($comentario->getIdUsuario());
        $comentario->getComentario();
        $fecha = $comentario->getFecha();
        $idComentario = $comentario->getId();
        $texto = $comentario->getComentario();
        $username = $user->getNombre();

        $botonRespuesta = estaLogado() ? '<a href="#" data-idComentario="' . $idComentario . '" data-idPost="' . $id . '" class="btn btn-primary ajax-link">Responder</a>' : '';
        $html .= <<<EOS
                <div class="card mb-4">
                    <div class="card-header">  
                        <p class="mb-0">$username</p>
                        <p class="text-muted small">$fecha</p>
                    </div>
                    <div class="card-body">
                        <p>$texto</p>
                        $botonRespuesta
                    </div>
                </div>
                <div id="$idComentario"> </div>
        EOS;
    }
    $html .= "
            </div>
        </div>
    </div>
</div>";

    return $html;
}
