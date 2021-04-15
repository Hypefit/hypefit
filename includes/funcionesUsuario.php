<?php
require_once __DIR__.'/config.php';
require_once __DIR__ . '/UsuarioDAO.php';


function saludo() {
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

function checkLogin($email, $password) {
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

function logout() {
    //Doble seguridad: unset + destroy
    unset($_SESSION["login"]);
    unset($_SESSION["rol"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["idUsuario"]);
    unset($_SESSION["aprobado"]);

    session_destroy();
    session_start();
}
