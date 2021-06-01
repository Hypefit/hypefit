<?php

use hypefit\DAO\ComentarioDAO;
use hypefit\TO\Comentario;

require_once '../config.php';
require_once '../autorizacion.php';

$idPost = htmlspecialchars(trim(strip_tags($_POST['idPost'])));
$idComentarioPadre = htmlspecialchars(trim(strip_tags($_POST['idComentarioPadre'])));
$texto = htmlspecialchars(trim(strip_tags($_POST['mensaje'])));
$idUsuario = idUsuarioLogado();

$dao = new ComentarioDAO();
$comentario = new Comentario();
$comentario->setComentario($texto);
$comentario->setIdUsuario($idUsuario);
$comentario->setIdPost($idPost);
$comentario->setidComentarioPadre($idComentarioPadre);
$dao->crearComentario($comentario);

header("Location: " . RUTA_APP . "/verPost.php?id=" . $idPost);