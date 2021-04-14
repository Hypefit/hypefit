<?php

$textoRutina = filter_input(INPUT_POST, 'rutina', FILTER_SANITIZE_SPECIAL_CHARS);
$titulo = filter_input(INPUT_POST, 'rutina', FILTER_SANITIZE_SPECIAL_CHARS);
$categoria = $_POST['categoria'];
$idEntrenador = $_SESSION['idUsuario'];

$rutina = new Rutina();
$rutina->setIdEntrenador($idEntrenador);
$rutina->setRutina($rutina);
$rutina->setCategoria($categoria);
$rutina->setTitulo($titulo);

$dao = new RutinaDAO();
$id = $dao->crearRutina($rutina);

header("Location: ../verRutina.php?$id");