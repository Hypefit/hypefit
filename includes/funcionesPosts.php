<?php

function crearListaPosts(): string {
    $dao = new PostsDAO();
    $lista = $dao->getAllPosts();

    $html = "<ul>";
    foreach($lista as $post) {
        $html .= "<li> <a href='verPost.php?id=" . $post->getId() . "'>" . $post->getTitulo() ."</a> </li>";
    }
    $html .= "</ul>";

    return $html;
}

function mostrarPost($id) : string {
    $dao = new PostsDAO();
    $post = $dao->getPost($id);

    if ($post == null) {
        return "No existe ninguna rutina con el id especificado.";
    } else {
        $dao = new UsuarioDAO();
        $creador = $dao->getUsuario($post->getIdCreador());
        $nombreCreador = $creador->getNombre();

        $html = "<h1>" . $post->getTitulo() . "</h1><br>";
        $html .= "Escrito por " . $nombreCreador . "<br>";
        #$html .= "Categoria: " . $post->getCategoria() . "<br>";
        $html .= "<p>" . $post->getPost() . "</p>";

        return $html;
    }
}

function mostrarComentariosPost($id) : string {
    $daoC = new ComentarioDAO();
    $daoU = new UsuarioDAO();

    $comentarios = $daoC->getComentariosDelPost($id);

    $html = "<ul>";
    foreach($comentarios as $comentario) {
        $user = $daoU->getUsuario($comentario->getId());
        $html .= "<li>" . $user->getNombre() . " | " .  $comentario->getFecha() . "<br>" .
        $comentario->getComentario() ."</li>";
    }
    $html .= "</ul>";

    return $html;
}