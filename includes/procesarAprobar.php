<?php

require_once __DIR__ . '/UsuarioDAO.php';
require_once __DIR__ . '/config.php';

if (!empty($_POST['marcados'])) {
    $dao = new UsuarioDAO();
    foreach ($_POST['marcados'] as $id) {
        if (isset($_POST['aprobar'])) {
            $dao->aprobarUsuario($id);
        } else { // Suponemos que se ha marcado eliminar entonces
            $dao->eliminarUsuario($id);
        }
    }
}

header("Location:" . RUTA_APP . "/perfil.php");