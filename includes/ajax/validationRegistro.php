<?php

use hypefit\DAO\UsuarioDAO;
require_once "../config.php";

    $dao = new UsuarioDAO();
    $nombreError = false;
    $nombreModif = false;
    $emailError = false;
    $emailModif = false;
    $passError = false;
    $passModif = false;

    if (isset($_POST["user"])) { //Campo nombre de usuario
        $nombre = $_POST["user"];

        if(empty($nombre)){ //comprobación campo vacío
            echo "<span>Este campo no puede estar vacío</span>";
            $nombreError = true;
            $nombreModif = true;
        }
        else {
            $nombreClear = strip_tags($nombre);
            $nombreModif = true;
            if(strlen($nombreClear) < 6 || strlen($nombreClear) > 20) { //comprobación longitud nombre
                echo "<span>El nombre de usuario debe contener entre 6 y 20 caracteres</span>";
                $nombreError = true;
            }
            else if(!preg_match("/^([a-zA-Z0-9])+([ .])?([a-zA-Z0-9])*$/", $nombreClear)) { //comprobación caracteres especiales
                echo "<span>El nombre de usuario solo puede contener letras, números y un espacio o un punto. 
                Debe empezar con una letra o un número</span>";
                $nombreError = true;
            }
            else if($dao->existeNombreUsuario($nombreClear)){ //Comprobación nombre existente en BD
                echo "<span>Nombre de usuario no disponible</span>";
                $nombreError = true;
            }
            else {
                $nombreError = false;
            }
        }
    }

    else if (isset($_POST["email"])) { //Campo dirección de correo electrónico
        $email = $_POST["email"];
        $emailModif = true;

        $emailClear = strip_tags($email);

        if(empty($emailClear)){ //comprobación campo vacío
            echo "<span>Este campo no puede estar vacío</span>";
            $emailError = true;
        }
        else if(!filter_var($emailClear, FILTER_VALIDATE_EMAIL)){ //Comprobación dirección válida
            echo "<span>Correo no válido</span>";
            $emailError = true;
        }
        else if( $dao->existeEmail($emailClear)) { //Comprobación correo existente en BD
            echo "<span>Correo no disponible</span>";
            $emailError = true;
        }
        else {
            $emailError = false;
        }
    }
    else if(isset($_POST["pass"])) { //Campo contraseña
        $pass = $_POST["pass"];

        $strongRegex = "/^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$/";
        $mediumRegex = "/^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$/";
        $enoughRegex = "/^(?=.{8,}).*$/";

        if (strlen($pass) == 0) {
            $passModif = true;
            $passError = true;
            echo "<span>Este campo no puede estar vacío</span>";
        }
        else if (preg_match($strongRegex, $pass)) {
            $passModif = true;
            $passError = false;
            echo "<span class = 'text-success'>Contraseña muy segura!</span>";
        }
        else if (preg_match($mediumRegex,$pass)) {
            $passModif = true;
            $passError = false;
            echo '<span class = "text-primary">Contraseña segura</span>';
        }
        else if (preg_match($enoughRegex, $pass)) {
            $passModif = true;
            $passError = false;
           echo "<span class = 'text-danger'>Contraseña débil</span>";
        }
        else {
            $passModif = true;
            $passError = true;
            echo '<span class = "text-danger">La contraseña debe tener mínimo 8 caracteres</span>';
        }
    }



