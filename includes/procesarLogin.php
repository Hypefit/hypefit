<?php
require_once __DIR__.'/includes/config.php';

	$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));

	$dao = new UsuarioDAO();
	$usuario = $dao->getUsuarioPorEmail($email);
	$hash = $usuario->getHashPassword();


	if (password_verify($password, $hash)){
		$_SESSION["login"] = true;
		$_SESSION["nombre"] = $usuario->getNombre();
		$_SESSION["rol"] = $usuario->getRol();
		$_SESSION["aprobado"] = $usuario->getAprobado();
	}

	header("Location: ../perfil.php");

