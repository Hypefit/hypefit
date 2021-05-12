<?php


use hypefit\DAO\RecetaDAO;
use hypefit\DAO\UsuarioDAO;

function crearListaRecetas($categoria): string {
    $dao = new RecetaDAO();
    $lista = $dao->getRecetasPorCategoria($categoria);
    $html="";

    foreach($lista as $receta) {
        $html .= "
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary ms-2 text-center'>
                    <h5 class='card-header text-capitalize'>" . $receta->getTitulo() . "</h5>
                    <div class='card-body'>
                        <p class='card-text'>" . $receta->getDescripcion() . "</p>
                        <a href='verRutina.php?id=" . $receta->getId() . "'' class='btn btn-primary'>Ver Rutina</a>
                    </div>        
                </div>
            </div>
            ";
    }
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