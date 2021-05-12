<?php

use hypefit\DAO\ComentarioDAO;
use hypefit\DAO\PostsDAO;
use hypefit\DAO\UsuarioDAO;

require_once __DIR__ . '/config.php';

function crearListaPosts(): string {
    $dao = new PostsDAO();
    $lista = $dao->getAllPosts();

    $html = "<ul>";
    foreach($lista as $post) {
        $html .= "
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-12'>
                <div class='card h-100 border-secondary ms-2 text-center'>
                    <h5 class='card-header text-capitalize'>" . $post->getTitulo() . "</h5>
                    <div class='card-body'>
                        <a href='verPost.php?id=" . $post->getId() . "'' class='btn btn-primary'>Ver Post</a>
                    </div>        
                </div>
            </div>
            ";
    }
    $html .= "</ul>";

    return $html;
}

function mostrarPost($id) : string {
    $dao = new PostsDAO();
    $post = $dao->getPost($id);

    if ($post == null) {
        return "<p>No existe ningún post con el id especificado.</p>";
    } else {
        //$dao = new UsuarioDAO();
        //$creador = $dao->getUsuario($post->getIdCreador());
        //$nombreCreador = $creador->getNombre();

        $html = "<h1>" . $post->getTitulo() . "</h1>";
        //$html .= "Creado por: " . $nombreCreador . "<br>";
        $html .= mostrarComentariosPost($id);

        return $html;
    }
}

function mostrarComentariosPost($id) : string {
    $daoC = new ComentarioDAO();
    $daoU = new UsuarioDAO();

    $comentarios = $daoC->getComentariosDelPost($id);

    $html = "<ul>";
    foreach($comentarios as $comentario) {
        $user = $daoU->getUsuario($comentario->getIdUsuario());
        $comentario->getComentario() ."</li>";
        //$html .= "<li>" . $user->getNombre() . " | " .  $comentario->getFecha() . "<br>" .
        $fecha = $comentario->getFecha();
        $texto = $comentario->getComentario();
        $username = $user->getNombre();
        
        $html .= <<<EOS
<div class="container-fluid mt-100">
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">  
                    <div class="media-body ml-3">"$username"</a>
                        <div class="text-muted small">"$fecha"</div>
                    </div>  
            </div>
            <div class="card-body">
                <p>"$texto"</p>
            </div>
            
        </div>
    </div>
</div>
</div>
EOS;
    }
    $html .= "</ul>";

    return $html;
}
