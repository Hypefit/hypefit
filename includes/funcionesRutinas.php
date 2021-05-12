<?php


use hypefit\DAO\RutinaDAO;
use hypefit\DAO\UsuarioDAO;

function crearListaRutinas($categoria): string {
    $dao = new RutinaDAO();
    $lista = $dao->getRutinasPorCategoria($categoria);
    $html="";
    foreach($lista as $rutina) {
        $html .= "
            <div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 pb-2'>
                <div class='card h-100 border-secondary ms-2 text-center'>
                    <h5 class='card-header text-capitalize'>" . $rutina->getTitulo() . "</h5>
                    <div class='card-body'>
                        <p class='card-text'>" . $rutina->getDescripcion() . "</p>
                        <a href='verRutina.php?id=" . $rutina->getId() . "'' class='btn btn-primary'>Ver Rutina</a>
                    </div>        
                </div>
            </div>
            ";
    }

    return $html;

}

function mostrarRutina($id): string {
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