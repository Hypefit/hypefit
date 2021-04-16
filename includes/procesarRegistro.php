<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/UsuarioDAO.php';

$name = htmlspecialchars(trim(strip_tags($_REQUEST["name"])));
$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
$rol = $_REQUEST["rol"];

$dao = new UsuarioDAO();

if($dao->getUsuarioPorEmail($email)){
    echo "<p>Esta dirección de email ya está registrada</p>";
    exit();
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


header("Location: " . RUTA_APP . "/perfil.php");
