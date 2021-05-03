<?php

use hypefit\DAO\UsuarioDAO;
use hypefit\TO\Usuario;

require_once __DIR__.'/config.php';

function saludo(): string {
    $raizApp = RUTA_APP;
    if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
        $html = "Bienvenido, ${_SESSION['nombre']} <a href='${raizApp}/perfil.php'>Perfil</a>
                                                   <a href='${raizApp}/logout.php'>(salir)</a>";

    } else {
        $html = "Usuario desconocido. <a href='${raizApp}/login.php'>Login</a>
                                      <a href='${raizApp}/registro.php'>Registro</a>";
    }

    return $html;
}

function checkLogin($email, $password): bool {
    $dao = new UsuarioDAO();
    $usuario = $dao->getUsuarioPorEmail($email);

    if ($usuario && password_verify($password,$usuario->getHashPassword())) {
        $_SESSION["login"] = true;
        $_SESSION["nombre"] = $usuario->getNombre();
        $_SESSION["idUsuario"] = $usuario->getId();
        $_SESSION["rol"] = $usuario->getRol();
        $_SESSION["aprobado"] = $usuario->getAprobado();
        return true;
    }
    else{
        return false;
    }
}

function crearUsuario($email, $name, $password, $rol) {
    $dao = new UsuarioDAO();
    if ($dao->getUsuarioPorEmail($email)){
        return false;
    }

    $newUser = new Usuario();
    $newUser->setNombre($name);
    $newUser->setEmail($email);
    $newUser->setHashPassword(password_hash($password, PASSWORD_DEFAULT));
    $newUser->setRol($rol);

    if($newUser->getRol() != "registrado"){
        $newUser->setAprobado(0);
    }
    else $newUser->setAprobado(1);

    $id = $dao->crearUsuario($newUser);

    $_SESSION["login"] = true;
    $_SESSION["nombre"] = $newUser->getNombre();
    $_SESSION["rol"] = $newUser->getRol();
    $_SESSION["aprobado"] = $newUser->getAprobado();
    $_SESSION["idUsuario"] = $id;

    return true;
}

function logout() {
    unset($_SESSION["login"]);
    unset($_SESSION["rol"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["idUsuario"]);
    unset($_SESSION["aprobado"]);

    session_destroy();
    session_start();
}

function mostrarUsuariosSinAprobar(): string {
    $dao = new UsuarioDAO();
    $usuariosSinAprobar = $dao->getUsuariosSinAprobar();

    $html = "<h2>Usuarios sin aprobar</h2>";
    $ruta = RUTA_APP . "/includes/procesarAprobar.php";
    $html .= '<form action="' . $ruta .'" method="POST">';
    foreach($usuariosSinAprobar as $usuario) {
        $html .= '<input type="checkbox" name="marcados[]" value="' . $usuario->getId() . '"/>' . $usuario->getNombre() . ' | Rol: ' . ucwords($usuario->getRol());
        $html .= "<br>";
    }
    $html .= '<input type="submit" name="aprobar" value="Aprobar" />';
    $html .= '<input type="submit" name="eliminar" value="Eliminar" />';
    $html .= "</form>";
    return $html;
}
