<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/Post.php';
require_once __DIR__ . '/PostsDAO.php';
require_once __DIR__ . '/Comentario.php';
require_once __DIR__ . '/ComentarioDAO.php';
require_once __DIR__ . '/autorizacion.php';

$texto = htmlspecialchars(trim(strip_tags($_REQUEST["mensaje"])));
$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
$idUsuario = idUsuarioLogado();

$dao = new PostsDAO();
$post = new Post();
$post->setTitulo($titulo);
$post->setIdCreador($idUsuario);
$idPost = $dao->crearPost($post);

$dao = new ComentarioDAO();
$comentario = new Comentario();
$comentario->setComentario($texto);
$comentario->setIdUsuario($idUsuario);
$comentario->setIdPost($idPost);
$dao->crearComentario($comentario);

header("Location:" . RUTA_APP . "/verPost.php?id=$idPost");