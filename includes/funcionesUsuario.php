<?php

use hypefit\DAO\UsuarioDAO;
use hypefit\TO\Usuario;

require_once __DIR__.'/config.php';

function saludo(): string {
    $raizApp = RUTA_APP;
    if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
        /*$html = "<li class='no_link menu_right' >Bienvenido, ${_SESSION['nombre']}</li>
                 <li><a href='${raizApp}/perfil.php'>Perfil</a></li>
                 <li><a href='${raizApp}/logout.php'>(salir)</a></li>";
    */
        $html = "<li class='nav-item'><a class='nav-link' href='${raizApp}/perfil.php'>Perfil</a></li>
                 <li class='nav-item'><a class='nav-link' href='${raizApp}/logout.php'>Salir</a></li>
                 </ul>
                 <span class='navbar-text'>Bienvenido, ${_SESSION['nombre']}</span>";
    } else {
        /*$html = "<li class='no_link menu_right'>Usuario invitado</li>
                 <li><a href='${raizApp}/login.php'>Login</a></li>
                 <li><a href='${raizApp}/registro.php'>Registro</a></li>";
    */
        $html = "<li class='nav-item'><a class='nav-link' href='${raizApp}/login.php'>Login</a></li>
                 <li class='nav-item'><a class='nav-link' href='${raizApp}/registro.php'>Registro</a></li>
                 </ul>
                 <span class='navbar-text'>Usuario invitado</span>";
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