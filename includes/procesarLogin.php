<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/funcionesUsuario.php';

	$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
	$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));

	if(checkLogin($email, $password))
        header("Location: " . RUTA_APP . "/perfil.php");
    else
        echo "<p>Usuario o contraseña incorrectos</p>";

