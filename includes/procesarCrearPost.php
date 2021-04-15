<?php
require_once __DIR__.'/Post.php';
require_once __DIR__.'/Comentario.php';


$textoPost = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS);
$titulo = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS);
$idUsuario = $_SESSION["idUsuario"];

$post = new Post();
$post->setIdCreador($idUsuario);
$post->setTitulo($titulo);


$dao = new PostsDAO();
$id = $dao->crearPost($post);

$comentario = new Comentario();
$comentario->setComentario($textoPost);
$comentario->setIdPost($id);
$comentario->setFecha(date_default_timezone_get());
$comentario->setIdUsuario($idUsuario);

header("Location: ../verPost.php?$id");