<?php


use hypefit\DAO\RecetaDAO;
use hypefit\DAO\UsuarioDAO;

function crearListaRecetas($categoria): string {
    $dao = new RecetaDAO();
    $lista = $dao->getRecetasPorCategoria($categoria);

    $html = "<ul>";
    foreach($lista as $receta) {
        $html .= "<li> <a href='verReceta.php?id=" . $receta->getId() . "'>" . $receta->getTitulo() ."</a> </li>";
    }
    $html .= "</ul>";

    return $html;
}

function mostrarReceta($id): string {
    $dao = new RecetaDAO();
    $receta = $dao->getReceta($id);

    if ($receta == NULL) {
        return "<p>No existe ninguna receta con el id especificado.</p>";
    } else {
        $dao = new UsuarioDAO();
        $usuario = $dao->getUsuario($receta->getIdNutricionista());
        $nombreNutricionista = $usuario->getNombre();

        $html = "<h1>" . $receta->getTitulo() . "</h1>";
        $html .= "Creada por: " . $nombreNutricionista . "<br>";
        $html .= "Categoria: " . ucwords($receta->getCategoria()) . "<br>";
        $html .= "<p>" . $receta->getReceta() . "</p>";

        return $html;
    }


}