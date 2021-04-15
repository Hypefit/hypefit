<?php
require_once __DIR__ . 'funcionesRutinas.php';
require_once __DIR__.'/config.php';
require_once __DIR__ .'/RutinaDAO.php';

$dao = new RutinaDAO();

//Buscamos el ultimo id para cambiar el nombre de la imagen por el siguiente id
$ultimoId = $dao->devolverUltimoId();
$ultimoId++;

$textoRutina = filter_input(INPUT_POST, 'rutina', FILTER_SANITIZE_SPECIAL_CHARS);
$titulo = filter_input(INPUT_POST, 'rutina', FILTER_SANITIZE_SPECIAL_CHARS);
$categoria = $_POST['categoria'];
$idEntrenador = $_SESSION['idUsuario'];

$formatosPermitidos = array("image/jpeg", "image/png", "image/png");
$tipoImagen = mime_content_type($_FILES["archivo"]["tmp_name"]);
if (!in_array($tipoImagen, $formatosPermitidos)) {
    die("Tipo de archivo no permitido");
}
$extensionImagen = pathinfo($_FILES["archivo"]["tmp_name"], PATHINFO_EXTENSION);
$rutaImagen = RUTA_IMGS . "/" . $ultimoId . "." .  $extensionImagen;
if (!move_uploaded_file(pathinfo($_FILES["archivo"]["tmp_name"]), $rutaImagen)) {
    die("No se ha podido subir la imagen");
}

$rutina = new Rutina();
$rutina->setIdEntrenador($idEntrenador);
$rutina->setRutina($textoRutina);
$rutina->setCategoria($categoria);
$rutina->setTitulo($titulo);
$rutina->setImagen($rutaImagen);

$id = $dao->crearRutina($rutina);

header("Location: ../verRutina.php?$id");