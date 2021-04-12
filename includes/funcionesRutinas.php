<?php

function crearListaRutinas(): string {
    $dao = new RutinaDAO();
    $lista = $dao->getAllRutinas();

    $html = "<ul>";
    foreach($lista as $rutina) {
        $html .= "<li> <a href='verRutina.php?id=" . $rutina->getId() . "'>" . $rutina->getTitulo() ."</a> </li>";
    }
    $html .= "</ul>";

    return $html;
}