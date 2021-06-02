<?php

use hypefit\DAO\UsuarioDAO;

require_once "../config.php";

$dao = new UsuarioDAO();
$emailError = true;
$passError = true;
$usuario = NULL;

if (isset($_POST["email"])) { //Campo dirección de correo electrónico
    $email = $_POST["email"];

    $emailClear = strip_tags($email);

    if (($emailClear != $email) || empty($emailClear) || !filter_var($emailClear, FILTER_VALIDATE_EMAIL)
        || !$dao->existeEmail($emailClear)) {

        $emailError = true;
    }
    else {
        $usuario = $dao->getUsuarioPorEmail($emailClear);
        $emailError = false;
    }
}
else $emailError=true;

if(isset($_POST["pass"])){
    $password = $_POST["pass"];
    if($usuario != NULL){
        if(empty($password) || !password_verify($password,$usuario->getHashPassword()))
            $passError = true;
        else $passError = false;
    }
    else $passError = true;

}
else $passError=true;

if($emailError || $passError)
    echo "<span>Email o contraseña incorrectos</span>";
