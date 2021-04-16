<?php

function estaLogado()
{
    return isset($_SESSION['login']);
}


function esUsuario($idUsuario)
{
    return estaLogado() && $_SESSION['idUsuario'] === $idUsuario;
}

function idUsuarioLogado()
{
    $result = false;
    if (estaLogado()) {
        $result = $_SESSION['idUsuario'];
    }
    return $result;
}

function esAdmin()
{
    return estaLogado() && isset($_SESSION['rol']) && ($_SESSION['rol'] === "administrador");
}

function esEntrenador(): bool {
    return estaLogado() && isset($_SESSION['rol']) && ($_SESSION['rol'] === "entrenador");
}

function estaAprobado() : bool {
    return estaLogado() && isset($_SESSION['rol']) && (($_SESSION['rol'] === "entrenador") || ($_SESSION['rol'] === "nutricionista")) && ($_SESSION['aprobado']);
}