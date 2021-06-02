<?php

use hypefit\DAO\PostsDAO;

require_once "../config.php";
require_once "../autorizacion.php";

$dao = new PostsDAO();
$array['numPosts'] = $dao->getNumPostsPorCreador(idUsuarioLogado());
echo json_encode($array);
