<?php

function estaLogado(): bool {
    return isset($_SESSION['login']);
}


function esUsuario($idUsuario): bool {
    return estaLogado() && $_SESSION['idUsuario'] === $idUsuario;
}

function idUsuarioLogado() {
    $result = false;
    if (estaLogado()) {
        $result = $_SESSION['idUsuario'];
    }
    return $result;
}

function esAdmin(): bool {
    return estaLogado() && isset($_SESSION['rol']) && ($_SESSION['rol'] === "administrador");
}

function esEntrenador(): bool {
    return estaLogado() && isset($_SESSION['rol']) && ($_SESSION['rol'] === "entrenador");
}

function estaAprobado() : bool {
    return estaLogado() && isset($_SESSION['aprobado']) && ($_SESSION['aprobado']);
}