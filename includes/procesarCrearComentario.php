<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/Comentario.php';
require_once __DIR__ . '/ComentarioDAO.php';
require_once __DIR__ . '/autorizacion.php';

$texto = htmlspecialchars(trim(strip_tags($_REQUEST["mensaje"])));
$idPost = htmlspecialchars(trim(strip_tags($_REQUEST["idPost"])));
$idUsuario = idUsuarioLogado();

$dao = new ComentarioDAO();
$comentario = new Comentario();
$comentario->setComentario($texto);
$comentario->setIdUsuario($idUsuario);
$comentario->setIdPost($idPost);
$dao->crearComentario($comentario);

header("Location:" . RUTA_APP . "/verPost.php?id=$idPost");