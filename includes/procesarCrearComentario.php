<?php
    require_once __DIR__ . '/config.php';

    $texto = htmlspecialchars(trim(strip_tags($_REQUEST["respuesta"])));
    $idPost = htmlspecialchars(trim(strip_tags($_REQUEST["idPost"])));
    $idUsuario = idUsuarioLogado();

    $dao = new ComentarioDAO();
    $comentario = new Comentario();
    $comentario->setComentario($texto);
    $comentario->setIdUsuario($idUsuario);
    $comentario->setIdPost($idPost);
    $dao->crearComentario($comentario);

    header("Location:" . RUTA_APP . "verPost.php?$idPost");