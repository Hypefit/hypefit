<?php
require_once __DIR__ . '/funcionesRutinas.php';
require_once __DIR__.'/config.php';
require_once __DIR__ .'/RutinaDAO.php';

$dao = new RutinaDAO();

$textoRutina = htmlspecialchars(trim(strip_tags($_REQUEST["rutina"])));
$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
$categoria = $_POST['categoria'];
$idEntrenador = $_SESSION['idUsuario'];

$rutina = new Rutina();
$rutina->setIdEntrenador($idEntrenador);
$rutina->setRutina($textoRutina);
$rutina->setCategoria($categoria);
$rutina->setTitulo($titulo);

$id = $dao->crearRutina($rutina);

header("Location: ../verRutina.php?id=$id");