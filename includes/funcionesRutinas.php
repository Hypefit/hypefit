<?php
require_once __DIR__ . '/RutinaDAO.php';
require_once __DIR__ . '/UsuarioDAO.php';

function crearListaRutinas($categoria): string {
    $dao = new RutinaDAO();
    $lista = $dao->getRutinasPorCategoria($categoria);

    $html = "<ul>";
    foreach($lista as $rutina) {
        $html .= "<li> <a href='verRutina.php?id=" . $rutina->getId() . "'>" . $rutina->getTitulo() ."</a> </li>";
    }
    $html .= "</ul>";

    return $html;
}

function mostrarRutina($id) {
    $dao = new RutinaDAO();
    $rutina = $dao->getRutina($id);

    if ($rutina == NULL) {
        return "<p>No existe ninguna rutina con el id especificado.</p>";
    } else {
        $dao = new UsuarioDAO();
        $usuario = $dao->getUsuario($rutina->getIdEntrenador());
        $nombreEntrenador = $usuario->getNombre();

        $html = "<h1>" . $rutina->getTitulo() . "</h1>";
        $html .= "Creada por: " . $nombreEntrenador . "<br>";
        $html .= "Categoria: " . ucwords($rutina->getCategoria()) . "<br>";
        $html .= "<p>" . $rutina->getRutina() . "</p>";

        return $html;
    }


}