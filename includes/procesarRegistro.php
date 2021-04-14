<?php
require_once __DIR__.'/includes/config.php';

$name = htmlspecialchars(trim(strip_tags($_REQUEST["name"])));
$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
$rol = $_REQUEST["rol"];

$dao = new UsuarioDAO();

if($dao->getUsuarioPorEmail($email)){
    echo "Esta dirección de email ya está registrada";
    exit();
}

#Se crea un nuevo usuario y se añade a la base de datos
$newUser = new Usuario();
$newUser->setId(null); //Hay que cambiar la forma de asignar ids
$newUser->setNombre($name);
$newUser->setEmail($email);
$newUser->setHashPassword(hash("md5", $password)); //No se si esto es correcto
$newUser->setRol($rol);

if($newUser->getRol() != "regular"){
    $newUser->setAprobado(0);
}
else $newUser->setAprobado(1);

$dao->crearUsuario($newUser);

$_SESSION["login"] = true;
$_SESSION["nombre"] = $newUser->getNombre();
$_SESSION["rol"] = $newUser->getRol();
$_SESSION["aprobado"] = $newUser->getAprobado();


header("Location: ../perfil.php");
