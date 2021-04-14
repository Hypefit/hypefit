<?php
require_once __DIR__.'/config.php';

$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
$password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));

if(!checkLogin($email, $password))
    return false;
else
    header("Location: ../perfil.php");

