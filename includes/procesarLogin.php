<?php
require_once __DIR__.'/config.php';


	$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));

	$dao = new UsuarioDAO();
	$usuario = $dao->getUsuarioPorEmail($email);
	$hash = $usuario->getHashPassword();

	#Mostrar por pantalla. No se si así funciona.
    if(!$usuario){ //si el email no esta en la bd
        echo "Usuario no registrado";
        exit();
    }

	if (password_verify($password, $hash)){
		$_SESSION["login"] = true;
		$_SESSION["nombre"] = $usuario->getNombre();
		$_SESSION["rol"] = $usuario->getRol();
		$_SESSION["aprobado"] = $usuario->getAprobado();
	}

	header("Location: ../perfil.php");

